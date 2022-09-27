// // Get the modal
// var modal = document.getElementById("saleModal");
//
// // Get the button that opens the modal
// var btn = document.getElementsByTagName("button");
//
// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];
//
// // When the user clicks on the button, open the modal
// btn.onclick = function () {
//     modal.style.display = "block";
//
// //           	var cardTitle = jQuery(".card-item .card-title").text();
// //               console.log(cardTitle);
// }
//
// // When the user clicks on <span> (x), close the modal
// span.onclick = function () {
//     modal.style.display = "none";
// }
//
// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }

(function ($) {
    $('.myBtn').on('click', function () {
        $('#saleModal').show();

        const productTitle = jQuery(this).parents('.card-item').find('.card-title').text();
        const productLenght = jQuery(this).parents('.card-item').find('.card-title').text();
        const productHeight = jQuery(this).parents('.card-item').find('.card-title').text();
        const price = jQuery(this).parents('.card-item').find('.calculator-price').text();

        const formProductName = jQuery('form input[name="product-name"]');
        const formProductLength = jQuery('form input[name="product-length"]');
        const formProductHeight = jQuery('form input[name="product-height"]');
        const formPrice = jQuery('form input[name="price"]');

        formProductName.val(productTitle);
        formProductLength.val(productLenght);
        formProductHeight.val(productHeight);
        formPrice.val(price);
    });

    $('.close').on('click', function () {
        $('#saleModal').hide();
    });


    let activeLengthVal = jQuery('.catalog__parameter--length input[type="radio"]:checked').val();
    let activeStepVal = jQuery('.catalog__parameter--step input[type="radio"]:checked').val();

    console.log(activeLengthVal);
    console.log(activeStepVal);
	
	jQuery('.card-item').each(function(){
		jQuery(this).find('.calculator-price:first-child').addClass('active');
	})

    jQuery('.catalog__parameter--length input[type="radio"]').on('change', function () {
        jQuery(this).parents('.card-item').find('.calculator-price').removeClass('active');

        activeLengthVal = jQuery(this).val();
        activeStepVal = jQuery(this).parents('.card-item').find('.catalog__parameter--step input[type="radio"]:checked').val();

        console.log(activeLengthVal);
        console.log(activeStepVal);

        if ("2" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_2_1').addClass('active');
        }
        if ("4" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_4_1').addClass('active');
        }
        if ("6" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_6_1').addClass('active');
        }
        if ("8" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_8_1').addClass('active');
        }
        if ("10" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_10_1').addClass('active');
        }

        if ("2" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_2_067').addClass('active');
        }
        if ("4" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_4_067').addClass('active');
        }
        if ("6" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_6_067').addClass('active');
        }
        if ("8" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_8_067').addClass('active');
        }
        if ("10" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_10_067').addClass('active');
        }


        if ("2" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_2_05').addClass('active');
        }
        if ("4" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_4_05').addClass('active');
        }
        if ("6" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_6_05').addClass('active');
        }
        if ("8" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_8_05').addClass('active');
        }
        if ("10" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_10_05').addClass('active');
        }
    });

    jQuery('.catalog__parameter--step input[type="radio"]').on('change', function () {
        jQuery(this).parents('.card-item').find('.calculator-price').removeClass('active');

        activeLengthVal = jQuery(this).parents('.card-item').find('.catalog__parameter--length input[type="radio"]:checked').val();

        activeStepVal = jQuery(this).val();

        console.log(activeLengthVal);
        console.log(activeStepVal);

        if ("2" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_2_1').addClass('active');
        }
        if ("4" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_4_1').addClass('active');
        }
        if ("6" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_6_1').addClass('active');
        }
        if ("8" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_8_1').addClass('active');
        }
        if ("10" == activeLengthVal && "1" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_10_1').addClass('active');
        }


        if ("2" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_2_067').addClass('active');
        }
        if ("4" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_4_067').addClass('active');
        }
        if ("6" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_6_067').addClass('active');
        }
        if ("8" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_8_067').addClass('active');
        }
        if ("10" == activeLengthVal && "0,67" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_10_067').addClass('active');
        }


        if ("2" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_2_05').addClass('active');
        }
        if ("4" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_4_05').addClass('active');
        }
        if ("6" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_6_05').addClass('active');
        }
        if ("8" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_8_05').addClass('active');
        }
        if ("10" == activeLengthVal && "0,50" == activeStepVal) {
            jQuery(this).parents('.card-item').find('#size_10_05').addClass('active');
        }
    });


    // счетчик

    (function () {

        let counter = document.querySelectorAll('.counter');
        let limit = 0; // Переменная, чтобы останавливать функцию, когда всё запустится.
        window.addEventListener('scroll', function () {
            if (limit == counter.length) {
                return;
            }

            for (let i = 0; i < counter.length; i++) {
                let pos = counter[i].getBoundingClientRect().top; //Позиция блока, считая сверху окна
                let win = window.innerHeight - 40; // На 40 пикселей меньше, чем высота окна
                if (pos < win && counter[i].dataset.stop == "0") {
                    counter[i].dataset.stop = 1; // Останавливаем перезапуск счета в этом блоке
                    let x = 0;
                    limit++; // Счетчик будет запущен, увеличиваем переменную на 1
                    let int = setInterval(function () {
                        // Раз в 60 миллисекунд будет прибавляться 50-я часть нужного числа
                        x = x + Math.ceil(counter[i].dataset.to / 50);
                        counter[i].innerText = x;
                        if (x > counter[i].dataset.to) {
                            //Как только досчитали - стираем интервал.
                            counter[i].innerText = counter[i].dataset.to;
                            clearInterval(int);
                        }
                    }, 60);
                }
            }
        });

        // .counter {
        //         width: 200px;
        //         margin: 400px 0 200px 0;
        //         border: 2px solid orange;
        //         font-size: 30px; color: #045acf;
        //         text-align: center;
        //     }
        //     <div class="counter" data-to="26" data-stop="0">0</div>
        //     <div class="counter" data-to="1000" data-stop="0">0</div>
        //     <div class="counter" data-to="2500000" data-stop="0">0</div>

    })();
})(jQuery);
