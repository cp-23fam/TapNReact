<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .btn {
        border: 0;
        outline: none;
        font-size: medium;
        border-radius: 10px;
        width: 100%;
    }

    .popup {
        width: 400px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.1);
        text-align: center;
        padding: 0 30px 60px;
        color: #333;
        visibility: hidden;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        display: none;
    }

    .open-popup {
        visibility: visible;
        top: 50%;
        transform: translate(-50%, -50%) scale(1);
        display: block;
    }

    .popup h2 {
        font-size: 38px;
        font-weight: 500;
        margin: 30px 0 10px;
    }

    .popup button {
        width: 100%;
        margin-top: 50px;
        padding: 10px 0;
        background-color: #dc3545;
        color: #fff;
        border: 0;
        outline: none;
        font-size: 18px;
        border-radius: 4px;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }
</style>