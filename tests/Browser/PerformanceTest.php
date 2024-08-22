namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PerformanceTest extends DuskTestCase
{
    /**
     * Test page load performance.
     *
     * @return void
     */
    public function testPageLoadPerformance()
    {
        $this->browse(function (Browser $browser) {
            $start = microtime(true);
            $browser->visit('/')
                    ->waitForText('Laravel');
            $end = microtime(true);

            $loadTime = $end - $start;
            echo "Page load time: " . $loadTime . " seconds.";
        });
    }
}
