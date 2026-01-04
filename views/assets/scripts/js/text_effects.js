// OpsNerds text effects
// Safe to include globally

(function () {
    function runScanMessage() {
        const key = 'ops_scan_msg_seen';
        const el = document.getElementById('scan-msg');
        if (!el) return;

       //If shown already in this tab session, remove it
        if (sessionStorage.getItem(key) === '1') {
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
