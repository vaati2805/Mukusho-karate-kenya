@props([
    'media',
    'fallbackImage' => null,
    'aspectClass'   => 'aspect-[4/3]',
    'roundedClass'  => 'rounded-2xl',
])

@if($media && $media->count() > 1)
@php
    $items = $media->values(); // reindex so 0,1,2...
    $count = $items->count();
    $itemsJson = $items->map(fn($m) => [
        'url'     => $m->url,
        'type'    => $m->type,            // 'image' | 'video'
        'name'    => $m->original_name ?? basename($m->path),
    ])->toJson();
@endphp

<div
    x-data="mediaSlideshow({{ $count }}, {{ $itemsJson }})"
    x-init="init()"
    x-cloak
    class="relative {{ $aspectClass }} {{ $roundedClass }} overflow-hidden group bg-black select-none"
    @keydown.arrow-right.window="if($el.matches(':hover')) nextSlide()"
    @keydown.arrow-left.window="if($el.matches(':hover')) prevSlide()"
>

    {{-- ══ Slides ══ --}}
    <template x-for="(item, idx) in items" :key="idx">
        <div
            class="absolute inset-0 transition-opacity duration-700"
            :class="current === idx ? 'opacity-100 z-10' : 'opacity-0 z-0'"
        >
            {{-- Image slide --}}
            <template x-if="item.type === 'image'">
                <img
                    :src="item.url"
                    :alt="item.name"
                    loading="lazy"
                    class="w-full h-full object-cover"
                >
            </template>

            {{-- Video slide --}}
            <template x-if="item.type === 'video'">
                <div class="relative w-full h-full">
                    <video
                        class="w-full h-full object-cover bg-black"
                        :id="'slide-video-' + idx"
                        playsinline
                        preload="metadata"
                        :muted="muted"
                        @ended="onVideoEnded()"
                        @play="videoPlaying = true"
                        @pause="videoPlaying = false"
                    >
                        <source :src="item.url" type="video/mp4">
                        <source :src="item.url" type="video/webm">
                        <source :src="item.url" type="video/ogg">
                    </video>

                    {{-- Play / Pause centre button (visible when not playing) --}}
                    <button
                        @click.stop="toggleVideoPlay(idx)"
                        class="absolute inset-0 flex items-center justify-center transition-opacity"
                        :class="videoPlaying ? 'opacity-0 hover:opacity-100' : 'opacity-100'"
                        aria-label="Play / Pause"
                    >
                        <div class="w-16 h-16 rounded-full bg-black/50 flex items-center justify-center backdrop-blur-sm border border-white/20 shadow-xl">
                            <svg x-show="!videoPlaying" class="w-7 h-7 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <svg x-show="videoPlaying" class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 19h4V5H6zm8-14v14h4V5z"/>
                            </svg>
                        </div>
                    </button>
                </div>
            </template>
        </div>
    </template>

    {{-- ══ Top-right controls (mute + download) ══ --}}
    <div class="absolute top-3 right-3 z-30 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">

        {{-- Mute / Unmute button (only when current is a video) --}}
        <template x-if="items[current] && items[current].type === 'video'">
            <button
                @click.stop="toggleMute()"
                class="w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black/80 backdrop-blur-sm border border-white/10 transition"
                :aria-label="muted ? 'Unmute' : 'Mute'"
                title="Toggle sound"
            >
                {{-- Sound on --}}
                <svg x-show="!muted" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z"/>
                    <path x-show="!muted" d="M14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                </svg>
                {{-- Muted --}}
                <svg x-show="muted" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                </svg>
            </button>
        </template>

        {{-- Download button --}}
        <a
            :href="items[current] ? items[current].url : '#'"
            :download="items[current] ? items[current].name : ''"
            @click.stop
            class="w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black/80 backdrop-blur-sm border border-white/10 transition"
            title="Download"
            aria-label="Download"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
        </a>
    </div>

    {{-- ══ Left / Right Arrows ══ --}}
    <button
        @click.stop="prevSlide()"
        class="absolute left-3 top-1/2 -translate-y-1/2 z-30 w-9 h-9 rounded-full bg-black/50 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 hover:bg-black/70 transition backdrop-blur-sm border border-white/10"
        aria-label="Previous"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button
        @click.stop="nextSlide()"
        class="absolute right-3 top-1/2 -translate-y-1/2 z-30 w-9 h-9 rounded-full bg-black/50 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 hover:bg-black/70 transition backdrop-blur-sm border border-white/10"
        aria-label="Next"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- ══ Dot indicators + type badge ══ --}}
    <div class="absolute bottom-3 left-0 right-0 z-30 flex flex-col items-center gap-1.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        {{-- Type badge --}}
        <span
            x-show="items[current] && items[current].type === 'video'"
            class="text-[10px] uppercase tracking-widest font-bold text-white bg-black/50 px-2.5 py-0.5 rounded-full backdrop-blur-sm"
        >● Video</span>

        {{-- Dots --}}
        <div class="flex gap-1.5">
            <template x-for="(item, idx) in items" :key="idx">
                <button
                    @click.stop="goTo(idx)"
                    :aria-label="'Slide ' + (idx + 1)"
                    class="rounded-full transition-all duration-300"
                    :class="[
                        current === idx ? 'w-5 h-2 bg-white' : 'w-2 h-2 bg-white/50 hover:bg-white/80',
                        item.type === 'video' ? 'ring-1 ring-amber-400/70' : ''
                    ]"
                ></button>
            </template>
        </div>
    </div>

    {{-- ══ Video progress bar ══ --}}
    <div x-show="items[current] && items[current].type === 'video'" class="absolute bottom-0 left-0 right-0 z-30 h-1 bg-white/10">
        <div class="h-full bg-amber-400 transition-none" :style="'width: ' + videoProgress + '%'"></div>
    </div>

</div>

<script>
function mediaSlideshow(count, items) {
    return {
        current: 0,
        total: count,
        items: items,
        muted: true,
        videoPlaying: false,
        videoProgress: 0,
        autoTimer: null,
        progressTimer: null,

        init() {
            this.startAutoplay();
        },

        startAutoplay() {
            this.stopAutoplay();
            // Only auto-advance if current slide is NOT a video
            if (this.currentIsVideo()) return;
            this.autoTimer = setInterval(() => {
                if (!this.currentIsVideo()) this.nextSlide();
            }, 5000);
        },

        stopAutoplay() {
            if (this.autoTimer) { clearInterval(this.autoTimer); this.autoTimer = null; }
        },

        currentIsVideo() {
            return this.items[this.current] && this.items[this.current].type === 'video';
        },

        goTo(idx) {
            const prev = this.current;
            this.pauseVideoAt(prev);
            this.current = idx;
            this.videoProgress = 0;
            this.videoPlaying = false;
            this.stopAutoplay();
            this.$nextTick(() => {
                if (this.currentIsVideo()) {
                    this.playVideoAt(idx);
                    this.trackProgress(idx);
                } else {
                    this.startAutoplay();
                }
            });
        },

        nextSlide() { this.goTo((this.current + 1) % this.total); },
        prevSlide() { this.goTo((this.current - 1 + this.total) % this.total); },

        toggleVideoPlay(idx) {
            const vid = this.getVideo(idx);
            if (!vid) return;
            vid.paused ? vid.play() : vid.pause();
        },

        playVideoAt(idx) {
            const vid = this.getVideo(idx);
            if (vid) { vid.muted = this.muted; vid.play().catch(() => {}); }
        },

        pauseVideoAt(idx) {
            const vid = this.getVideo(idx);
            if (vid) { vid.pause(); vid.currentTime = 0; }
            if (this.progressTimer) { clearInterval(this.progressTimer); this.progressTimer = null; }
        },

        getVideo(idx) {
            return document.getElementById('slide-video-' + idx);
        },

        toggleMute() {
            this.muted = !this.muted;
            const vid = this.getVideo(this.current);
            if (vid) vid.muted = this.muted;
        },

        onVideoEnded() {
            this.videoPlaying = false;
            this.videoProgress = 100;
            // Advance to next slide after video ends
            setTimeout(() => this.nextSlide(), 800);
        },

        trackProgress(idx) {
            if (this.progressTimer) clearInterval(this.progressTimer);
            this.progressTimer = setInterval(() => {
                const vid = this.getVideo(idx);
                if (vid && vid.duration) {
                    this.videoProgress = (vid.currentTime / vid.duration) * 100;
                }
            }, 250);
        },
    };
}
</script>

@elseif($media && $media->count() === 1)
@php
    $single = $media->first();
@endphp

<div class="relative {{ $aspectClass }} {{ $roundedClass }} overflow-hidden group bg-black">
    @if($single->isVideo())
        <video
            id="single-video-{{ $single->id }}"
            class="w-full h-full object-cover bg-black"
            playsinline
            preload="metadata"
            x-data="{ muted: true, playing: false }"
        >
            <source src="{{ $single->url }}" type="video/mp4">
            <source src="{{ $single->url }}" type="video/webm">
        </video>

        {{-- Play / Pause overlay --}}
        <div
            x-data="{ muted: true, playing: false }"
            class="absolute inset-0 flex items-center justify-center"
            x-init="$watch('playing', v => {})"
        >
            <button
                @click="
                    const v = $el.closest('.group').querySelector('video');
                    if(v.paused){ v.play(); playing=true; } else { v.pause(); playing=false; }
                "
                class="w-16 h-16 rounded-full bg-black/50 flex items-center justify-center border border-white/20 backdrop-blur-sm shadow-xl transition"
                :class="playing ? 'opacity-0 hover:opacity-100' : 'opacity-100'"
                aria-label="Play / Pause"
            >
                <svg x-show="!playing" class="w-7 h-7 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                <svg x-show="playing" class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6zm8-14v14h4V5z"/></svg>
            </button>

            {{-- Top-right controls --}}
            <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                {{-- Mute toggle --}}
                <button
                    @click.stop="
                        muted=!muted;
                        const v=$el.closest('.group').querySelector('video');
                        v.muted=muted;
                    "
                    class="w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black/80 backdrop-blur-sm border border-white/10 transition"
                    :aria-label="muted ? 'Unmute' : 'Mute'"
                    title="Toggle sound"
                >
                    <svg x-show="!muted" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
                    <svg x-show="muted" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/></svg>
                </button>

                {{-- Download --}}
                <a
                    href="{{ $single->url }}"
                    download="{{ $single->original_name ?? basename($single->path) }}"
                    class="w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black/80 backdrop-blur-sm border border-white/10 transition"
                    title="Download"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </a>
            </div>
        </div>

    @elseif($single->isImage())
        <img loading="lazy" src="{{ $single->url }}" alt="{{ $single->original_name ?? 'Mukusho Karate Media' }}" class="w-full h-full object-cover">
        {{-- Image download --}}
        <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
            <a href="{{ $single->url }}" download="{{ $single->original_name ?? basename($single->path) }}"
               class="w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black/80 backdrop-blur-sm border border-white/10 transition"
               title="Download">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </a>
        </div>
    @endif
</div>

@elseif($fallbackImage)
<div class="relative {{ $aspectClass }} {{ $roundedClass }} overflow-hidden">
    <img loading="lazy" src="{{ $fallbackImage }}" alt="Mukusho Karate Kenya" class="w-full h-full object-cover">
</div>

@else
<div class="relative {{ $aspectClass }} {{ $roundedClass }} overflow-hidden bg-slate-100 flex items-center justify-center">
    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
    </svg>
</div>
@endif
