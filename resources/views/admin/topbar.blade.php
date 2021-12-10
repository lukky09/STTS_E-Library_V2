<style>
    .topbar {
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
    }

    .toggle {
        position: relative;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5em;
        cursor: pointer;
    }

    .search {
        position: relative;
        width: 400px;
        margin: 0 10px;
    }

    .search label {
        position: relative;
        width: 100%;
    }

    .search label input {
        width: 100%;
        height: 40px;
        border-radius: 40px;
        padding: 5px 20px;
        padding-left: 35px;
        font-size: 18px;
        outline: none;
        border: 1px solid var(--black2);
    }

    .search label ion-icon {
        margin-top: 10px;
        position: absolute;
        left: 10px;
        font-size: 1.2em;
    }

    .user {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }

    .user img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>

<!-- top bar -->
<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>
    <!-- search -->
    <div class="search">
        <label>
            <input type="text" placeholder="Search here">
            <ion-icon name="search-outline"></ion-icon>
        </label>
    </div>
    <!-- user img -->
    <div class="user">
        <img src="{{ url(URL::asset('rss/images/profile.png')) }}">
    </div>
</div>
