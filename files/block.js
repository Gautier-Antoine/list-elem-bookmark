if (document.querySelector('.block-best-betting-site')) {
    var block = document.querySelector('.block-best-betting-site');
    var main = block.querySelector('.main');

    var sort = block.querySelector('.sort');
    function sort_elem(elem) {
        var sort = block.querySelector('.sort');
        main_disappear();
        setTimeout(
            () => {
                if (sort.classList.contains('alphanum')) {
                    sort_position();
                    sort.textContent = 'Sort Alphabetically';
                } else {
                    sort_alpha();
                    sort.textContent = 'Sort Numerically';
                }
                sort.classList.toggle('alphanum');
                main_appear();
            } , 500
        )
    }
    function change_view() {
        if (main) {
            main_disappear();
            setTimeout(
                () => {
                    main.classList.toggle('card');
                    main_appear();
                } , 500
            )
        }
    }

    function sort_alpha() {
        var elems = block.querySelectorAll('.elem');
        var arr = [];
        elems.forEach((item) => {
            arr.push(item.id);
            item.remove();
        });
        arr.sort();
        arr.forEach((id) => {
            elems.forEach((elem) => {
                if (elem.id === id) {
                    main.append(elem);

                }
            })
        });
    }
    function sort_position() {
        var elems = block.querySelectorAll('.elem');
        var arr = [];
        elems.forEach((item) => {
            arr.push(item.querySelector('h2').textContent);
            item.remove();
        });
        arr.sort();
        arr.forEach((id) => {
            elems.forEach((elem) => {
                if (elem.querySelector('h2').textContent === id) {
                    main.append(elem);
                }
            })
        });
    }
    function get_link(elem) {
        window.location.href = elem.querySelector('a.btn').href;
    }

    function main_disappear() {
        main.style.transform = "translateX(200%)";
    }
    function main_appear() {
        // setTimeout(
        //     () => {
                main.style.transform = "translateX(0%)";
        //     } , 500
        // )
    }
}