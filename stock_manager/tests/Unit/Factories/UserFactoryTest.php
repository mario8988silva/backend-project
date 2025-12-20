<?php

namespace Tests\Unit\Factories;

use App\Models\User;

class UserFactoryTest extends BaseFactoryTest
{
    public function user_type_factory_factory_creates_record()
    {
        $this->assertFactoryCreates(User::class);
    }

    public function user_factory_factory_makes_record()
    {
        $this->assertFactoryMakes(User::class);
    }
}
