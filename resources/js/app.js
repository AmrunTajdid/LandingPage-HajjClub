import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Google Ads & GTM Conversion tracking helper
window.trackConversion = function (ctaName, targetUrl) {
    // Push event to GTM dataLayer
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'conversion_lead_click',
        cta_name: ctaName,
        cta_target: targetUrl || '',
        timestamp: new Date().toISOString()
    });

    // If gtag is initialized, report conversion event
    if (typeof window.gtag === 'function' && window.GOOGLE_ADS_CONVERSION_ID) {
        window.gtag('event', 'conversion', {
            send_to: window.GOOGLE_ADS_CONVERSION_ID,
            event_category: 'Engagement',
            event_label: ctaName,
        });
    }
};
