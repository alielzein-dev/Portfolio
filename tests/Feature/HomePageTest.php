<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_home_page_loads(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_home_page_shows_content_from_the_portfolio_config(): void
    {
        config([
            'portfolio.name' => ['first' => 'Test', 'last' => 'Person'],
            'portfolio.role' => 'Full stack developer',
            'portfolio.contact.email' => 'test@example.org',
            'portfolio.work.projects.0.title' => 'Shop rebuild',
        ]);

        $this->get('/')
            ->assertSeeText('Test')
            ->assertSeeText('Person')
            ->assertSeeText('Full stack developer')
            ->assertSee('mailto:test@example.org', false)
            ->assertSeeText('Shop rebuild')
            ->assertSeeText('Get in touch')
            ->assertSee('<title>Test Person | Full stack developer</title>', false);
    }

    public function test_every_section_the_nav_links_to_exists(): void
    {
        $response = $this->get('/');

        foreach (['hero', 'services', 'about', 'work', 'contact'] as $id) {
            $response->assertSee('id="'.$id.'"', false);
        }
    }

    public function test_placeholder_is_shown_until_a_photo_is_set(): void
    {
        config(['portfolio.photo' => null]);
        $this->get('/')->assertSeeText('Your photo goes here');

        config(['portfolio.photo' => 'images/me.png']);
        $this->get('/')
            ->assertDontSeeText('Your photo goes here')
            ->assertSee('images/me.png', false);
    }

    public function test_project_shows_screenshot_when_given_and_mock_otherwise(): void
    {
        config([
            'portfolio.work.projects' => [
                ['type' => 'Site', 'title' => 'With image', 'text' => '', 'tools' => [], 'url' => null, 'image' => 'images/shot.jpg', 'mock' => 'site'],
                ['type' => 'App', 'title' => 'Without image', 'text' => '', 'tools' => [], 'url' => null, 'image' => null, 'mock' => 'dashboard'],
            ],
        ]);

        $this->get('/')
            ->assertSee('images/shot.jpg', false)
            ->assertSee('mock m-dash', false)
            ->assertDontSee('Visit the site');
    }

    public function test_project_with_a_gallery_shows_every_screenshot_and_its_highlights(): void
    {
        config([
            'portfolio.work.projects' => [[
                'type' => 'System', 'title' => 'Gallery project', 'text' => '', 'tools' => [], 'url' => null,
                'highlights' => ['Does one useful thing'],
                'gallery' => [
                    ['src' => 'images/a.webp', 'thumb' => 'images/a-thumb.webp', 'caption' => 'First screen'],
                    ['src' => 'images/b.webp', 'caption' => 'Second screen'],
                ],
            ]],
        ]);

        $this->get('/')
            ->assertSee('data-gallery', false)
            ->assertSee('images/a.webp', false)
            ->assertSee('images/a-thumb.webp', false)
            ->assertSee('images/b.webp', false)
            ->assertSeeText('Second screen')
            ->assertSeeText('Does one useful thing')
            ->assertSee('aria-pressed="true"', false);
    }

    public function test_social_links_left_as_placeholders_are_hidden(): void
    {
        config(['portfolio.socials' => [
            'GitHub' => 'https://github.com/someone',
            'LinkedIn' => '#',
            'Instagram' => '',
        ]]);

        $this->get('/')
            ->assertSee('href="https://github.com/someone"', false)
            ->assertDontSeeText('LinkedIn')
            ->assertDontSeeText('Instagram');
    }

    public function test_page_has_no_contact_form(): void
    {
        $this->get('/')->assertDontSee('<form', false);
    }
}
