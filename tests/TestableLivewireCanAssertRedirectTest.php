<?php

namespace Tests;

use Livewire\Component;
use Livewire\LivewireManager;

class TestableLivewireCanAssertRedirectTest extends TestCase
{
    /** @test */
    public function can_assert_a_redirect_without_a_uri()
    {
        $component = app(LivewireManager::class)->test(RedirectComponent::class);

        $component->call('performRedirect');

        $component->assertRedirect();
    }

    /** @test */
    public function can_assert_a_redirect_with_a_uri()
    {
        $component = app(LivewireManager::class)->test(RedirectComponent::class);

        $component->call('performRedirect');

        $component->assertRedirect('/some');
    }
}

class RedirectComponent extends Component
{
    public function performRedirect()
    {
        $this->redirect('/some');
    }

    public function render()
    {
        return view('null-view');
    }
}
