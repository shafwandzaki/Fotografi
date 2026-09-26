<div
    x-data="{
        drops: Array.from({ length: 150 }, () => {
            const depth = Math.random(); // 0 = jauh, 1 = dekat
            const duration = 10 - depth;  // dekat = lebih cepat
            return {
                left: Math.random() * 100,
                length: 12 + depth * 28,
                width: depth > 0.7 ? 2 : 1,
                opacity: 0.15 + depth * 0.45,
                duration,
                delay: -Math.random() * duration, // negatif: langsung tersebar saat load
            };
        })
    }"
    class="pointer-events-none fixed inset-0 -z-10 overflow-hidden bg-[#131315]"
>
    <template x-for="(drop, index) in drops" :key="index">
        <div
            class="rain-drop absolute top-0"
            :style="`
                left: ${drop.left}%;
                width: ${drop.width}px;
                height: ${drop.length}px;
                opacity: ${drop.opacity};
                animation-duration: ${drop.duration}s;
                animation-delay: ${drop.delay}s;
            `"
        ></div>
    </template>
</div>

<style>
    .rain-drop {
        background: linear-gradient(to bottom, transparent, #aec2ff);
        border-radius: 9999px;
        animation: rain-fall linear infinite;
        will-change: transform;
    }

    @keyframes rain-fall {
        from { transform: translateY(-60px); }
        to   { transform: translateY(105vh); }
    }

    @media (prefers-reduced-motion: reduce) {
        .rain-drop { display: none; }
    }
</style>