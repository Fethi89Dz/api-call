(function() {
    var slider = document.getElementById('gallery'),
        sliderItems = document.getElementById('items'),
        prev = document.getElementById('prev'),
        next = document.getElementById('next');
    dots = Array.from(document.getElementsByClassName('dot'));
    slide(slider, sliderItems, prev, next);

    function slide(wrapper, items, prev, next) {

        posInitial = -1176,
            slides = items.getElementsByClassName('gallery-item'),
            slidesLength = slides.length,
            slideSize = items.getElementsByClassName('gallery-item')[0].offsetWidth + 10,
            firstSlide = slides[0],
            lastSlide = slides[slidesLength - 1],
            index = 0,
            allowShift = true;
        //prepend and append elements
        slides_array = Array.from(slides);
        // console.log(slides_array);
        slides_array.forEach(cloneItems);

        function cloneItems(item, index, arr) {
            mid_index = (arr.length / 2) - 1;
            if (index > mid_index) {
                cloned_node = (arr[index]).cloneNode(true);
                cloned_node.className = "gallery-item cloned";
                //console.log(cloned_node);
                items.insertBefore(cloned_node, firstSlide);
            }
            if (index <= mid_index) {

                cloned_node = (arr[index]).cloneNode(true);
                cloned_node.className = "gallery-item cloned";
                //console.log(cloned_node);
                items.appendChild(cloned_node);
            }
        }


        // Events binding
        prev.addEventListener('click', function() {
            shiftSlide(-1)
        });
        next.addEventListener('click', function() {
            shiftSlide(1)
        });
      
        for (var i = 0; i < dots.length; i++) {
            dots[i].addEventListener('click', function() {
                dotSlide(this)
            });
        }

        function dotSlide(dot) {
            new_dot_index = dot.getAttribute("data-index");
            removeActiveDotClass()
            dot.className = "dot dot-active";

            shiftDot(new_dot_index);

            //alert(new_dot_index + " "+ dot_index)
        }

        function removeActiveDotClass() {
            //removes old dot-active
            for (var i = 0; i < dots.length; i++) {

                if (dots[i].classList.contains('dot-active')) {
                    dots[i].classList.remove('dot-active');
                }
            }
        }

        function translateItems(position) {
            items.style.transform = "translate3d(" + (position) + "px, 0px, 0px)";
        }

        function shiftDot(index) {
            if (index == 0) {
                posInitial = -1176;

            } else if (index == 1) {
                posInitial = -2156;

            } else if (index == 2) {
                posInitial = -3136;

            }
            translateItems(posInitial);
        }

        function changeActiveDot() {
            removeActiveDotClass();
            if (posInitial >= -1960) {

                dots[0].classList.add("dot-active")
            } else if ((posInitial > -3136) && (posInitial <= -2156)) {
                dots[1].classList.add("dot-active")
            } else if ((posInitial > -3332) && (posInitial <= -3136)) {
                dots[2].classList.add("dot-active")
            }
        }


        function shiftSlide(dir, action) {

            //alert(index);
            if (allowShift) {
                if (dir == -1) {
                    posInitial += slideSize;
                    if (posInitial == -784) {
                        posInitial = -3136;
                    }
                    translateItems(posInitial);

                    if (posInitial == slideSize) {
                        posInitial = -2156;
                    }
                    index--;
                } else if (dir == 1) {
                    posInitial -= slideSize;

                    index++;
                    if (posInitial == -3528) {
                        posInitial = -1176;
                        index = 0;
                    }
                    translateItems(posInitial);
                }
                changeActiveDot()
            };

            //alert(posInitial);
            allowShift = true;
        }
    }
})();