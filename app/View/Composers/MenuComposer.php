<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
 
class MenuComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        public $menuItem = [
            'Home',
            'About',
            'Contact',
        ]
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('menuItem', $this->menuItem);
    }
}