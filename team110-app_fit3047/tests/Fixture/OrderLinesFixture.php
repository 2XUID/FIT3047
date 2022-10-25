<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderLinesFixture
 */
class OrderLinesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'order_lines_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'order_id' => 1,
            ],
        ];
        parent::init();
    }
}
