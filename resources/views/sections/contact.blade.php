<section class="block tint" id="contact">
    <div class="wrap contact-grid">
        <div data-reveal>
            <h2>{{ $p['contact']['heading'] }}<span class="dot">?</span></h2>
            <p class="lede">{{ $p['contact']['text'] }}</p>
        </div>
        <div data-reveal style="--d: .12s">
            <a class="big-mail" href="mailto:{{ $p['contact']['email'] }}">{{ $p['contact']['email'] }}</a>
            <ul class="details">
                <li>
                    <small>WhatsApp</small>
                    <a href="https://wa.me/{{ $p['contact']['whatsapp'] }}" target="_blank" rel="noopener">{{ $p['contact']['whatsapp_display'] }}</a>
                </li>
                <li>
                    <small>Location</small>
                    {{ $p['contact']['location'] }}
                </li>
            </ul>
        </div>
    </div>
</section>
