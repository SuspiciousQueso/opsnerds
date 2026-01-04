// OpsNerds text effects
// Safe to include globally

(function () {
    const key = 'ops_scan_msg_seen';

    function runScanMessage() {
        const el = document.getElementById('scan-msg');

        if (!el) {
            console.warn('[text_effects] #scan-msg not found');
            return;
        }

        console.log('[text_effects] scan effect running');

        // If we've shown it this session, hide/remove immediately
        if (sessionStorage.getItem(key) === '1') {
            console.log('[text_effects] already seen this session, removing');
            el.remove();
            return;
        }

        sessionStorage.setItem(key, '1');

        const blinks = 2;
        const blinkIntervalMs = 260;
        const holdAfterMs = 600;
        const fadeOutMs = 500;

        el.style.opacity = '1';
        el.style.transition = `opacity ${fadeOutMs}ms ease`;

        let toggles = blinks * 2;
        let visible = true;

        const timer = setInterval(() => {
            visible = !visible;
            el.style.opacity = visible ? '1' : '0.15';
            toggles--;

            if (toggles <= 0) {
                clearInterval(timer);
                setTimeout(() => {
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), fadeOutMs + 50);
                }, holdAfterMs);
            }
        }, blinkIntervalMs);
    }

    // Run after DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', runScanMessage);
    } else {
        runScanMessage();
    }
})();
