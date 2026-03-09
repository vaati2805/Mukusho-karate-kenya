<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        SiteContent::truncate();

        /* ─── PROGRAMS ───────────────────────────────────── */
        $programs = [
            [
                'title' => 'Tiny Warriors',
                'content' => 'Fun and engaging classes designed for young children. Focus on coordination, discipline, and building confidence through play-based karate.',
                'icon' => '👶',
                'image' => 'images/family.jpeg',
                'extra' => [
                    'age_range' => 'Ages 5-7',
                    'badge_color' => 'amber',
                    'session_length' => '60 min sessions',
                    'features' => ['Fun-first approach', 'Motor skills & coordination'],
                    'cta_text' => 'Enrol Now',
                    'is_popular' => false,
                ],
            ],
            [
                'title' => 'Beginners',
                'content' => 'Perfect for newcomers to martial arts. Learn basic stances, techniques, forms, and karate philosophy in a supportive environment.',
                'icon' => '🥋',
                'image' => 'images/Julius.jpeg',
                'extra' => [
                    'age_range' => 'Ages 8+',
                    'badge_color' => 'amber',
                    'session_length' => '90 min sessions',
                    'features' => ['Kihon & basic Kata', 'Discipline & respect'],
                    'cta_text' => 'Get Started',
                    'is_popular' => false,
                ],
            ],
            [
                'title' => 'Teens & Adults',
                'content' => 'Comprehensive training in kihon, kata, and kumite. Build strength, learn self-defense, and progress through the belt system.',
                'icon' => '⚡',
                'image' => 'images/david.jpeg',
                'extra' => [
                    'age_range' => 'Ages 13+',
                    'badge_color' => 'amber',
                    'session_length' => '120 min sessions',
                    'features' => ['Kihon, Kata & Kumite', 'Belt progression system'],
                    'cta_text' => 'Join Now',
                    'is_popular' => true,
                ],
            ],
            [
                'title' => 'Elite Competition',
                'content' => 'Intensive training for athletes competing in KKF tournaments, the Kenya Open, and beyond. Advanced kata and kumite strategies.',
                'icon' => '🏆',
                'image' => 'images/champinship.jpeg',
                'extra' => [
                    'age_range' => 'Advanced',
                    'badge_color' => 'red',
                    'session_length' => '120 min intensive',
                    'features' => ['Tournament preparation', 'KKF & Kenya Open events'],
                    'cta_text' => 'Enquire Now',
                    'is_popular' => false,
                ],
            ],
        ];

        foreach ($programs as $i => $p) {
            SiteContent::create([
                'section' => 'programs',
                'key' => \Str::slug($p['title']),
                'title' => $p['title'],
                'content' => $p['content'],
                'icon' => $p['icon'],
                'image' => $p['image'],
                'extra' => $p['extra'],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── CLUBS ──────────────────────────────────────── */
        $clubs = [
            ['name' => 'Nyeri Main Dojo', 'location' => 'Nyeri Town', 'county' => 'Nyeri County'],
            ['name' => 'Nanyuki Sports Club', 'location' => 'Nanyuki', 'county' => 'Laikipia County'],
            ['name' => 'Murang\'a Town Dojo', 'location' => 'Murang\'a Town', 'county' => 'Murang\'a County'],
            ['name' => 'Karatina University Club', 'location' => 'Karatina', 'county' => 'Nyeri County'],
            ['name' => 'Othaya Youth Karate', 'location' => 'Othaya', 'county' => 'Nyeri County'],
            ['name' => 'Sagana Martial Arts', 'location' => 'Sagana', 'county' => 'Kirinyaga County'],
            ['name' => 'Kenol Defenders Dojo', 'location' => 'Kenol', 'county' => 'Murang\'a County'],
            ['name' => 'Mukuyu Kids Club', 'location' => 'Mukuyu', 'county' => 'Murang\'a County'],
        ];

        foreach ($clubs as $i => $c) {
            SiteContent::create([
                'section' => 'clubs',
                'key' => \Str::slug($c['name']),
                'title' => $c['name'],
                'content' => $c['location'],
                'extra' => ['county' => $c['county']],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── SCHEDULE ──────────────────────────────────── */
        $schedule = [
            ['day' => 'Monday', 'time' => '5:30 PM - 7:30 PM', 'focus' => 'Kihon & Kata Fundamentals', 'active' => true],
            ['day' => 'Tuesday', 'time' => '5:30 PM - 7:30 PM', 'focus' => 'Kumite Techniques & Sparring', 'active' => true],
            ['day' => 'Wednesday', 'time' => '5:30 PM - 7:30 PM', 'focus' => 'Kata Refinement & Conditioning', 'active' => true],
            ['day' => 'Thursday', 'time' => '5:30 PM - 7:30 PM', 'focus' => 'Mixed Practice & Competition Prep', 'active' => true],
            ['day' => 'Fri - Sun', 'time' => 'Rest / Competition Days', 'focus' => 'Recovery & Tournament Participation', 'active' => false],
        ];

        foreach ($schedule as $i => $s) {
            SiteContent::create([
                'section' => 'schedule',
                'key' => \Str::slug($s['day']),
                'title' => $s['day'],
                'subtitle' => $s['time'],
                'content' => $s['focus'],
                'extra' => ['active' => $s['active']],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── EVENTS ─────────────────────────────────────── */
        $events = [
            ['date' => 'Jul 2025', 'day' => '19', 'title' => 'Mid-Year Belt Grading', 'location' => 'Othaya Catholic Parish Hall, Nyeri', 'type' => 'Grading', 'color' => 'amber', 'desc' => 'Testing and promotion of students to their next belt level. All registered members are eligible.'],
            ['date' => 'Aug 2025', 'day' => '09', 'title' => 'KKF Regional Championship', 'location' => 'Nyayo National Stadium, Nairobi', 'type' => 'Tournament', 'color' => 'red', 'desc' => 'Regional karate championship sanctioned by the Kenya Karate Federation. Kata & Kumite categories.'],
            ['date' => 'Oct 2025', 'day' => '18', 'title' => 'Elite Warrior Karate Open 2025', 'location' => 'Nyayo National Stadium, Nairobi', 'type' => 'Tournament', 'color' => 'red', 'desc' => 'The premier open karate tournament in Kenya. All age categories, individual and team events.'],
            ['date' => 'Nov 2025', 'day' => '22', 'title' => 'PowerGirl Africa Karate Championship', 'location' => 'Kasarani Indoor Arena, Nairobi', 'type' => 'Tournament', 'color' => 'red', 'desc' => 'Championing women in karate. Open to all female karatekas in novice and advanced categories.'],
            ['date' => 'Dec 2025', 'day' => '06', 'title' => 'End-of-Year Belt Grading & Awards', 'location' => 'Othaya Catholic Parish Hall, Nyeri', 'type' => 'Grading', 'color' => 'amber', 'desc' => 'Annual grading and awards ceremony. Recognizing outstanding students and competition achievements.'],
            ['date' => 'Feb 2026', 'day' => '14', 'title' => 'Kenya Open Karate Championship', 'location' => 'Kasarani Indoor Arena, Nairobi', 'type' => 'Tournament', 'color' => 'red', 'desc' => 'National karate championship bringing together the best karatekas from all counties across Kenya.'],
            ['date' => 'Apr 2026', 'day' => '04', 'title' => '4th Edition Mukusho Karate Kenya Children Championship', 'location' => 'Dedan Kimathi Stadium, Nyeri', 'type' => 'Tournament', 'color' => 'amber', 'desc' => 'Our highly anticipated 4th edition children\'s championship hosted by Mukusho Karate Kenya.'],
        ];

        foreach ($events as $i => $e) {
            SiteContent::create([
                'section' => 'events',
                'key' => \Str::slug($e['title']),
                'title' => $e['title'],
                'content' => $e['desc'],
                'extra' => [
                    'date' => $e['date'],
                    'day' => $e['day'],
                    'location' => $e['location'],
                    'type' => $e['type'],
                    'color' => $e['color'],
                ],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── ACHIEVEMENTS ───────────────────────────────── */
        $achievements = [
            [
                'title' => 'Sensei Benard Kihachu',
                'subtitle' => 'Male Kata',
                'content' => 'Member of the Kenya National Karate Team and Bronze Medalist at the 11th Commonwealth Karate Championships.',
                'image' => 'images/jamesinstructor.jpeg',
                'extra' => ['badge' => '🥇 Lead Competitor', 'badge_color' => 'amber'],
            ],
            [
                'title' => 'The Representation Team',
                'subtitle' => 'National Competitors',
                'content' => 'Our dedicated team of young athletes frequently represent Mukusho Karate Kenya at prestigious events like the Kenya Open and various national and regional championships. Their medals speak to their discipline!',
                'image' => null,
                'extra' => ['badge' => '🥊 Elite Team', 'badge_color' => 'red', 'is_placeholder' => true],
            ],
        ];

        foreach ($achievements as $i => $a) {
            SiteContent::create([
                'section' => 'achievements',
                'key' => \Str::slug($a['title']),
                'title' => $a['title'],
                'subtitle' => $a['subtitle'],
                'content' => $a['content'],
                'image' => $a['image'],
                'extra' => $a['extra'],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── INSTRUCTORS ────────────────────────────────── */
        SiteContent::create([
            'section' => 'instructors',
            'key' => 'sensei-benard-kihachu',
            'title' => 'Sensei Benard Kihachu',
            'subtitle' => 'Head Coach & Founder',
            'content' => 'Sensei Benard Kihachu (known as "Ben ben") is the founder and driving force behind Mukusho Karate Kenya. With over 10 years of experience in youth coaching, he is a karate instructor specialising in both sport karate and practical self-defence, and is actively partnering with a girls\' empowerment program in Kenya. A prominent member of the Kenya National Karate Team, he has medaled at the 11th Commonwealth Karate Championships. Through his MUKUSHO FILMS YouTube channel, TikTok (@benmukushokarate1), and Facebook outreach, he shares karate techniques and self-defence applications with a global audience.',
            'image' => 'images/jamesinstructor.jpeg',
            'extra' => [
                'role' => 'Head Coach & Founder',
                'tags' => ['Sport Karate', 'Self-Defence', 'KKF Affiliated', 'Youth Development'],
                'phone' => '+254724216488',
                'tiktok' => 'https://www.tiktok.com/@benmukushokarate1',
                'facebook' => 'https://www.facebook.com/benki.benben.3',
            ],
            'sort_order' => 1,
        ]);

        SiteContent::create([
            'section' => 'instructors',
            'key' => 'father-peter-kiongo',
            'title' => 'Father Peter Kiongo',
            'subtitle' => 'Spiritual Patron & Mentor',
            'content' => 'A Catholic priest serving the local community, Father Peter Kiongo is a pillar of spiritual and moral guidance for Mukusho Karate Kenya. Beyond physical training, his mentorship ensures that our karatekas develop strong character, discipline, and a deep sense of community responsibility.',
            'image' => null,
            'extra' => [
                'role' => 'Spiritual Patron & Mentor',
                'tags' => ['Character Development', 'Youth Mentorship', 'Community Outreach'],
            ],
            'sort_order' => 2,
        ]);

        /* ─── FAQS ───────────────────────────────────────── */
        $faqs = [
            ['q' => 'Do I need any prior experience to join?', 'a' => 'Not at all! Most of our members started as complete beginners. Sensei Gikonyo and the team will guide you every step of the way, helping you feel comfortable and confident from your very first session.'],
            ['q' => 'What ages do you accept?', 'a' => 'We welcome students from age 5 and up. We have a dedicated Little Warriors program for children (5-12), a Teens & Adults program (13+), and an Elite Competition track for advanced athletes of any age.'],
            ['q' => 'What should I wear to my first class?', 'a' => 'For your first class, comfortable athletic clothing (t-shirt and track pants) is perfect. Once you decide to continue, you can purchase a gi (karate uniform). We will help you with sizing.'],
            ['q' => 'How much does training cost?', 'a' => 'We offer affordable monthly packages. Your first trial session is completely free. Come train with us and see if it is the right fit. Contact Sensei Gikonyo at 0724 216 488 for current rates.'],
            ['q' => 'Can I compete in tournaments?', 'a' => 'Absolutely! Mukusho Karate Kenya athletes regularly compete in KKF sanctioned events like the Elite Warrior Karate Open at Nyayo Stadium and the Kenya Open at Kasarani. Sensei Gikonyo will let you know when you are ready.'],
            ['q' => 'Is karate safe for children?', 'a' => 'Yes! Safety is our top priority. Training is structured, supervised, and age-appropriate. Karate builds discipline and body awareness which actually helps prevent injuries in everyday life.'],
        ];

        foreach ($faqs as $i => $f) {
            SiteContent::create([
                'section' => 'faqs',
                'key' => 'faq-' . ($i + 1),
                'title' => $f['q'],
                'content' => $f['a'],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── VALUES ─────────────────────────────────────── */
        $values = [
            ['icon' => '🙏', 'title' => 'Respect', 'desc' => 'For oneself, others, and the art itself'],
            ['icon' => '⚡', 'title' => 'Discipline', 'desc' => 'Through regular training and commitment'],
            ['icon' => '🎯', 'title' => 'Focus', 'desc' => 'Control of both body and mind'],
            ['icon' => '💪', 'title' => 'Perseverance', 'desc' => 'Never giving up in the face of challenge'],
            ['icon' => '🤝', 'title' => 'Integrity', 'desc' => 'Adhering to ethical codes in all things'],
        ];

        foreach ($values as $i => $v) {
            SiteContent::create([
                'section' => 'values',
                'key' => \Str::slug($v['title']),
                'title' => $v['title'],
                'content' => $v['desc'],
                'icon' => $v['icon'],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── FEATURES (Why Train With Us grid) ──────────── */
        $features = [
            ['icon' => '🥋', 'title' => 'Expert Coaches', 'desc' => 'Led by Sensei Benard Kihachu with years of experience'],
            ['icon' => '👨‍👩‍👧‍👦', 'title' => 'Family Friendly', 'desc' => 'Classes for all ages with a welcoming environment'],
            ['icon' => '🏅', 'title' => 'Competition Success', 'desc' => 'Our students excel in national and regional tournaments'],
            ['icon' => '🎯', 'title' => 'Personal Growth', 'desc' => 'Develop mental strength, confidence, and leadership'],
            ['icon' => '🤝', 'title' => 'Strong Community', 'desc' => 'Join a supportive family of martial artists'],
            ['icon' => '📚', 'title' => 'Sport & Self Defence', 'desc' => 'Both competitive karate and practical self-defence skills'],
        ];

        foreach ($features as $i => $f) {
            SiteContent::create([
                'section' => 'features',
                'key' => \Str::slug($f['title']),
                'title' => $f['title'],
                'content' => $f['desc'],
                'icon' => $f['icon'],
                'sort_order' => $i + 1,
            ]);
        }

        /* ─── TESTIMONIALS ───────────────────────────────── */
        $testimonials = [
            ['name' => 'Wambui M.', 'role' => 'Kata Competitor', 'initial' => 'W', 'color' => 'red', 'text' => '"Mukusho Karate Kenya changed my life. Sensei Gikonyo pushes you to be your best while making sure you feel welcome from day one. I started with zero experience and within a year I was competing at nationals."'],
            ['name' => 'Akinyi O.', 'role' => 'Parent', 'initial' => 'A', 'color' => 'amber', 'text' => '"I enrolled my son at Mukusho Karate Kenya and the transformation has been incredible. He\'s more disciplined, focused in school, and has found a real community. The training schedule works perfectly for us after school."'],
            ['name' => 'David N.', 'role' => 'Gold Medalist, Kata', 'initial' => 'D', 'color' => 'emerald', 'text' => '"Training at Mukusho Karate Kenya is about more than fighting. It\'s about self-discipline, respect, and pushing your limits. The camaraderie among students and Sensei\'s dedication are unmatched."'],
        ];

        foreach ($testimonials as $i => $t) {
            SiteContent::create([
                'section' => 'testimonials',
                'key' => \Str::slug($t['name']),
                'title' => $t['name'],
                'subtitle' => $t['role'],
                'content' => $t['text'],
                'extra' => ['initial' => $t['initial'], 'color' => $t['color']],
                'sort_order' => $i + 1,
            ]);
        }
    }
}
