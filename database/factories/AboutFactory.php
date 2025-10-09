<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Daniras Dalmoth',
            'address' => 'Parwanipur-5, Bara, Nepal',
            'phone' => '+977 9845999137',
            'email' => 'infodanirasdalmoth@gmail.com',
            'website' => 'danirasdalmoth.com',
            'facebook' => 'www.facebook.com/danirasdalmoth',
            'instagram' => 'www.instagram.com/danirasdalmoth',
            'twitter' => null,
            'ceo_name' => 'Rahul Kalwar',
            'ceo_msg' => 'In this kingdom of a rapid changing world, survival in business must never be taken for granted. Our vision of the future must be to let new opportunities.\n\nOur business is guided by ethics and transparency, and we aim to further win and maintain our customers by preparing packaged product that validate price, quality and of course the taste.\n\nDanira\'s has been selected with thoughtful precision and utmost care to provide the best meal options. Our product comes from extensive research and strictly chosen top ingredients from around the world. And I would like to thank our customers for supporting us helping us in our growth. We appreciate your love, support and trust.',
            'ceo_photo' => '/storage/images/ceo.jpg',
            'chairman_name' => 'Nirmal Pd Gupta',
            'chairman_msg' => 'With the pride and experience of leading the domestic food industry, we are everyday discovering and exploring so as to progress with our customers and partners.\n\nOur main goal is to make our customers happy for which we are committed to give them the best product and services. Thank you all for your patience and help while our organization is constructing and internal management is in process. We appreciate your efforts and loyalty.',
            'chairman_photo' => '/storage/images/chairman.jpg',
            'logo' => '/storage/images/logo/logo.jpg',
        ];
    }
}
