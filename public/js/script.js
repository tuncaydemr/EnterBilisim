$(() => {
    $('.dropdown').mouseenter(function () {
        $(this).css({
            'background':'white',
            'color':'black'
        });

        let $show = $(this).index('.dropdown');
        $('.dropdown-menu').hide();
        $('.dropdown-menu').eq($show).fadeToggle('fast');

        $('.dropdown').mouseleave(function () {
            $('.dropdown').css({
                'background':'transparent',
                'color':'white'
            });
        });
    });

    $('.dropdown-menu').mouseleave(function () {
        $(this).hide();
    });

    $('.dropdown-menu').mouseenter(function () {
        let $show = $(this).index('.dropdown-menu');
        $('.dropdown').eq($show).css({
            'background':'white',
            'color':'black'
        });

        $(this).mouseleave(function () {
            $('.dropdown').css({
                'background':'transparent',
                'color':'white'
            });
        });
    });

    $('.loginRegister').click(function (e) {
        e.stopPropagation();
        $('.loginRegisterOpen').toggleClass('d-none');
    });

    $(document).click(function () {
        $('.loginRegisterOpen').addClass('d-none');
    });

    $('.loginRegister2').click(function (e) {
        e.stopPropagation();
        $('.loginRegisterOpen2').toggleClass('d-none');
    });

    $(document).click(function () {
        $('.loginRegisterOpen2').addClass('d-none');
    });

    function openModal() {
        if (window.location.pathname === "/home") {
            return;
        }

        // @ts-ignore
        $("#register").modal("show");

        $("#modalCloseButton, #modalCloseButton2, #modalCloseButton3, #modalCloseButton4").click(() => {
            window.location.href = "/home";
        });
    }

    openModal();
});
