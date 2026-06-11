<?php

namespace Database\Seeders;

use App\Enums\BookingStatus;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\BookingMember;
use App\Models\Category;
use App\Models\Festival;
use App\Models\FamilyMember;
use App\Models\GotraEntry;
use App\Models\Puja;
use App\Models\Temple;
use App\Models\TempleImage;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'manage temples',
            'manage pujas',
            'manage bookings',
            'manage blogs',
            'manage festivals',
            'manage testimonials',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $userRole = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'web']);

        $superAdminRole->syncPermissions($permissions);
        $adminRole->syncPermissions([
            'manage temples',
            'manage pujas',
            'manage bookings',
            'manage blogs',
            'manage festivals',
            'manage testimonials',
        ]);

        $categories = collect([
            'Rudrabhishek',
            'Satyanarayan',
            'Ganesh',
            'Navagraha',
            'Maa Durga',
        ])->map(function (string $name) {
            return Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        });

        $templeNames = [
            ['Kashi Vishwanath Temple', 'Varanasi', 'Uttar Pradesh'],
            ['Sree Padmanabhaswamy Temple', 'Thiruvananthapuram', 'Kerala'],
            ['Jagannath Temple', 'Puri', 'Odisha'],
            ['Somnath Temple', 'Veraval', 'Gujarat'],
            ['Badrinath Temple', 'Chamoli', 'Uttarakhand'],
            ['Vaishno Devi Temple', 'Katra', 'Jammu and Kashmir'],
            ['Meenakshi Amman Temple', 'Madurai', 'Tamil Nadu'],
            ['Golden Temple', 'Amritsar', 'Punjab'],
            ['Shirdi Sai Baba Temple', 'Shirdi', 'Maharashtra'],
            ['Kedarnath Temple', 'Rudraprayag', 'Uttarakhand'],
            ['Akshardham Temple', 'Delhi', 'Delhi'],
            ['Ramanathaswamy Temple', 'Rameswaram', 'Tamil Nadu'],
            ['Mahakaleshwar Temple', 'Ujjain', 'Madhya Pradesh'],
            ['Matrudevi Temple', 'Mysuru', 'Karnataka'],
            ['Lingaraj Temple', 'Bhubaneswar', 'Odisha'],
        ];

        $temples = collect($templeNames)->map(function (array $row, int $index) {
            [$name, $location, $state] = $row;

            return Temple::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => "A revered spiritual destination in {$location}, {$state}, known for sacred rituals and a serene devotee experience.",
                'location' => $location,
                'state' => $state,
                'featured_image' => "https://picsum.photos/seed/".Str::slug($name)."/1200/800",
                'gallery' => [
                    "https://picsum.photos/seed/".Str::slug($name)."-1/1200/800",
                    "https://picsum.photos/seed/".Str::slug($name)."-2/1200/800",
                    "https://picsum.photos/seed/".Str::slug($name)."-3/1200/800",
                ],
                'is_featured' => $index < 6,
            ]);
        });

        $temples->each(function (Temple $temple) {
            TempleImage::create([
                'temple_id' => $temple->id,
                'image_path' => "https://picsum.photos/seed/{$temple->slug}-gallery/1200/800",
                'caption' => "{$temple->name} view",
            ]);
        });

        $pujaNames = [
            'Maha Rudrabhishek',
            'Laghu Rudrabhishek',
            'Satyanarayan Katha',
            'Ganesh Puja',
            'Navagraha Shanti',
            'Maa Durga Saptashati',
        ];

        $pujas = collect();
        foreach ($temples as $index => $temple) {
            foreach ([0, 1] as $offset) {
                $name = $pujaNames[($offset + $index) % count($pujaNames)];
                $pujas->push(Puja::create([
                    'temple_id' => $temple->id,
                    'category_id' => $categories[($index + $offset) % $categories->count()]->id,
                    'name' => $name.' at '.$temple->name,
                    'slug' => Str::slug($name.' '.$temple->name.' '.$offset),
                    'description' => "A spiritually uplifting puja performed at {$temple->name} by experienced priests.",
                    'benefits' => 'Peace of mind, blessings, spiritual upliftment, and a devotee-friendly ritual flow.',
                    'duration_minutes' => [45, 60, 90, 120][($index + $offset) % 4],
                    'price' => [750, 1200, 1800, 2500][($index + $offset) % 4],
                    'featured_image' => "https://picsum.photos/seed/".Str::slug($name.' '.$temple->name)."/1200/800",
                    'status' => 'published',
                    'is_featured' => $index < 5,
                ]));
            }
        }

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
        ]);
        $admin->assignRole($superAdminRole);

        $regularNames = [
            'Aarav Sharma', 'Aanya Iyer', 'Vihaan Gupta', 'Ishita Rao', 'Arjun Mehta',
            'Anika Patel', 'Kabir Singh', 'Meera Nair', 'Rohan Verma', 'Sanya Joshi',
            'Dev Malhotra', 'Riya Kulkarni', 'Krishna Ahuja', 'Pooja Chatterjee', 'Aditya Mishra',
            'Nisha Bansal', 'Siddharth Jain', 'Sneha Yadav', 'Rahul Kapoor', 'Priya Saxena',
            'Manish Tiwari', 'Kavya Desai', 'Suresh Khatri', 'Anjali Puri', 'Vivek Aggarwal',
            'Neha Sinha', 'Gaurav Goyal', 'Shreya Menon', 'Amit Reddy', 'Tanya Arora',
            'Harsh Vardhan', 'Kriti Sharma', 'Deepak Rana', 'Lavanya Pillai', 'Nitin Kulkarni',
            'Madhuri Das', 'Rajesh Khanna', 'Bhavna Joshi', 'Piyush Kumar', 'Saloni Gupta',
            'Yash Bhatia', 'Ritika Shah', 'Karan Soni', 'Monika Verma', 'Anmol Thakur',
            'Sakshi Dutta', 'Varun Nair', 'Payal Sethi', 'Tarun Grover',
        ];

        $users = collect($regularNames)->map(function (string $name, int $index) use ($userRole) {
            $user = User::factory()->create([
                'name' => $name,
                'email' => Str::slug($name).($index + 1).'@example.com',
                'email_verified_at' => now(),
            ]);
            $user->assignRole($userRole);

            return $user;
        });

        $users->take(20)->each(function (User $user, int $index) {
            FamilyMember::create([
                'user_id' => $user->id,
                'name' => $user->name.' Sr.',
                'relation' => 'Parent',
                'date_of_birth' => Carbon::now()->subYears(58 + $index % 10),
                'gender' => 'Male',
            ]);

            GotraEntry::create([
                'user_id' => $user->id,
                'gotra' => collect(['Bharadwaj', 'Kashyap', 'Atri', 'Vashishtha', 'Gautam'])->random(),
                'description' => 'Primary family gotra for booking records.',
                'is_default' => true,
            ]);
        });

        $usersForBookings = $users->prepend($admin);
        $bookings = collect(range(1, 100))->map(function (int $index) use ($usersForBookings, $temples, $pujas) {
            $temple = $temples->random();
            $templePujas = $pujas->where('temple_id', $temple->id);
            $puja = $templePujas->random();
            $user = $usersForBookings->random();

            $booking = Booking::create([
                'user_id' => $user->id,
                'temple_id' => $temple->id,
                'puja_id' => $puja->id,
                'booking_date' => Carbon::now()->addDays($index % 40 + 1)->format('Y-m-d'),
                'full_name' => $user->name,
                'gotra' => collect(['Bharadwaj', 'Kashyap', 'Atri', 'Vashishtha', 'Gautam'])->random(),
                'nakshatra' => collect(['Ashwini', 'Bharani', 'Krittika', 'Rohini', 'Mrigashira'])->random(),
                'special_instructions' => 'Please arrange a peaceful and well-guided ritual.',
                'amount' => $puja->price,
                'status' => collect(BookingStatus::values())->random(),
            ]);

            $memberCount = random_int(0, 3);

            for ($memberIndex = 0; $memberIndex < $memberCount; $memberIndex++) {
                BookingMember::create([
                    'booking_id' => $booking->id,
                    'name' => fake()->name(),
                    'relation' => collect(['Father', 'Mother', 'Spouse', 'Child'])->random(),
                ]);
            }

            return $booking;
        });

        $blogTitles = [
            'How to Prepare for a Temple Ritual',
            'Understanding Gotra in Hindu Traditions',
            'Puja Booking Tips for Families',
            'Best Days for Devotional Offerings',
            'A Devotee Guide to Sankalp Rituals',
            'Why Temple Visits Feel Transformative',
            'Festival Planning for Busy Households',
            'A Simple Way to Track Family Sankalp Details',
            'What to Expect on a Puja Booking Journey',
            'Spiritual Travel Essentials for Pilgrims',
        ];

        foreach ($blogTitles as $index => $title) {
            Blog::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => "This is a detailed demo article about {$title}. It is written to feel polished and client-ready.",
                'featured_image' => "https://picsum.photos/seed/".Str::slug($title)."/1200/800",
                'status' => 'published',
                'published_at' => Carbon::now()->subDays($index * 3),
            ]);
        }

        $festivalNames = [
            'Maha Shivratri',
            'Holi',
            'Ram Navami',
            'Janmashtami',
            'Ganesh Chaturthi',
            'Navratri',
            'Dussehra',
            'Diwali',
            'Guru Purnima',
            'Makar Sankranti',
        ];

        foreach ($festivalNames as $index => $name) {
            Festival::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'festival_date' => Carbon::now()->addWeeks($index + 1)->format('Y-m-d'),
                'description' => "A spiritual festival celebration entry for {$name}.",
                'featured_image' => "https://picsum.photos/seed/".Str::slug($name)."/1200/800",
            ]);
        }

        $testimonialNames = [
            ['Suresh Agarwal', 'Devotee from Jaipur'],
            ['Meena Iyer', 'Family Head from Chennai'],
            ['Amit Sharma', 'Business Owner from Delhi'],
            ['Kavita Joshi', 'Teacher from Pune'],
            ['Rakesh Verma', 'Retired Officer from Indore'],
            ['Priyanka Nair', 'Homemaker from Kochi'],
            ['Harish Patel', 'Entrepreneur from Ahmedabad'],
            ['Anjali Sinha', 'Architect from Patna'],
            ['Nikhil Bansal', 'Chartered Accountant from Surat'],
            ['Pallavi Das', 'Doctor from Kolkata'],
        ];

        foreach ($testimonialNames as [$name, $designation]) {
            Testimonial::create([
                'name' => $name,
                'designation' => $designation,
                'message' => 'The booking experience felt smooth, devotional, and trustworthy. The demo platform captures the client story well.',
                'rating' => random_int(4, 5),
            ]);
        }
    }
}
