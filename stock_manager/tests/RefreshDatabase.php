use Illuminate\Foundation\Testing\RefreshDatabase;

class SupplierTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function supplier_can_have_orders()
    {
        $this->seed(); // runs DatabaseSeeder

        $supplier = \App\Models\Supplier::first();
        $order = \App\Models\Order::factory()->create(['supplier_id' => $supplier->id]);

        $this->assertTrue($supplier->orders->contains($order));
    }
}
