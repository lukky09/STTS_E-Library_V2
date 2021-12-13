<style>
    .container {
        margin-left: -20px;
        position: relative;
        width: 100%;
    }

    .navigation {
        position: fixed;
        width: 250px;
        height: 100%;
        background: var(--blue);
        border-left: 10px solid var(--blue);
        transition: 0.5s;
        overflow: hidden;
    }

    .navigation.active {
        width: 80px;
    }

    .navigation ul {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .navigation ul li {
        position: relative;
        width: 100%;
        list-style: none;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }

    .navigation ul li:hover,
    .navigation ul li.hovered {
        background: var(--white);
    }

    .navigation ul li:nth-child(1) {
        margin-bottom: 15px;
        pointer-events: none;
    }

    .navigation ul li a {
        position: relative;
        display: block;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: var(--white);
    }

    .navigation ul li:hover a,
    .navigation ul li.hovered a {
        color: var(--blue);
    }

    .navigation ul li a .icon {
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 70px;
        text-align: center;
    }

    .navigation ul li a .icon ion-icon {
        font-size: 1.75em;
    }

    .navigation ul li a .title {
        position: relative;
        display: block;
        padding: 0 10px;
        height: 60px;
        line-height: 60px;
        text-align: start;
        white-space: nowrap;
    }

    /* curve outside */
    .navigation ul li:hover a::before,
    .navigation ul li.hovered a::before {
        content: '';
        position: absolute;
        right: 0;
        top: -50px;
        width: 50px;
        height: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px 35px 0 10px var(--white);
        pointer-events: none;
    }

    .navigation ul li:hover a::after,
    .navigation ul li.hovered a::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: -50px;
        width: 50px;
        height: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px -35px 0 10px var(--white);
        pointer-events: none;
    }

    /* end sidebar */
</style>

<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="book-outline"></ion-icon>
                    </span>
                    <span class="title">Book</span>
                </a>
            </li>
            <li>
                <a href="/admin">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/customer">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Customers</span>
                </a>
            </li>
            <li>
                <a href="/admin/book">
                    <span class="icon">
                        <ion-icon name="library-outline"></ion-icon>
                    </span>
                    <span class="title">Book</span>
                </a>
            </li>
            <li>
                <a href="/admin/supplier">
                    <span class="icon">
                        <ion-icon name="bookmark-outline"></ion-icon>
                    </span>
                    <span class="title">Supplier</span>
                </a>
            </li>
            <li>
                <a href="/admin/shop">
                    <span class="icon">
                        <ion-icon name="cart-outline"></ion-icon>
                    </span>
                    <span class="title">Shop</span>
                </a>
            </li>
            <li>
                <a href="/admin/jual">
                    <span class="icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </span>
                    <span class="title">Sales Report</span>
                </a>
            </li>
            <li>
                <a href="/admin/beli">
                    <span class="icon">
                        <ion-icon name="pricetags-outline"></ion-icon>
                    </span>
                    <span class="title">Purchase Report</span>
                </a>
            </li>
            <li>
                <a href="{{url('/logoutUser')}}">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign out</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    //add hovered class in selected list item
    let list = document.querySelectorAll('.navigation li');
    function activeLink() {
        list.forEach((item) =>
        item.classList.remove('hovered'));
        this.classList.add('hovered');
    }
    list.forEach((item) =>
    item.addEventListener('mouseover', activeLink));
</script>
