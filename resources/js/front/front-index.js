// --------------------------- Typed text -------------------------------------
function typed_text(str, div) {
    var typed = new Typed(div, {
        strings: str,
        typeSpeed: 70,
        loop: true,
        showCursor: true,
        cursorChar: '|',
        backSpeed: 30,
        startDelay: 1350, // Задержка перед началом печати текста
        backDelay: 2500, // Задержка перед стиранием текста
        // strings: ["First ^1000 sentence.", "Second sentence."]  Пауза 1000 мс после печати слолва "First"
    });
}

let str_text = ["Bookkeeping,^1000 Accounting,^1000 Taxation^1000"];
typed_text(str_text, "#typing");

let contact_str = ["Contact Us", "Request an Online Meeting"];
typed_text(contact_str, "#contact-pic-text");

// --------------------------- Scroll to point    ----------------------------
function scroll(name, hh, ss) {
    jQuery(document).ready(function () {
        jQuery("a." + name).click(function () {
            elementClick = jQuery(this).attr("href")
            destination = jQuery(elementClick).offset().top - hh;
            jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination }, ss);
            return false;
        });
    });
}
scroll('scroll-contact', 30, 1500);

// --------------------------- MENU Scroll ----------------------------
document.addEventListener('DOMContentLoaded', function () {
    let headerMenu = $('#i-menu'), scrollPrev = 0;
    $(window).scroll(function () {
        let scrolled = $(window).scrollTop();
        (scrolled > 420) ? headerMenu.addClass('out-bg') : headerMenu.removeClass('out-bg');
        (scrolled > 420 && scrolled > scrollPrev) ? headerMenu.addClass('out') : headerMenu.removeClass('out');
        scrollPrev = scrolled;
    });
});

// ----------------------------- Open benefit  ------------------------------
$(document).ready(function () {
    $('#knopka').click(function () {
        $('.benefit').toggleClass('benefit-all');
    });
});




