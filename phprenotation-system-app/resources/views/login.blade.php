<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<div>
    <h1>Login</h1>
    <form action="/login" method="POST">
        @csrf
        <div>
            <label for="user">User:</label>
            <input type="text" id="user" name="user" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger"
            style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; margin-top: 20px; border-radius: 5px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<style>
    * {
        box-sizing: border-box;
    }

    html,
    body {
        height: 100%;
    }

    body {
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        font-family: Arial, Helvetica, sans-serif;
        color: #1f2937;
    }

    body>div {
        width: 100%;
        max-width: 420px;
        padding: 2rem;
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
    }

    h1 {
        margin: 0 0 1.5rem;
        text-align: center;
        font-size: 2rem;
        color: #111827;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    form>div {
        padding: 0;
        background: transparent;
        box-shadow: none;
        width: 100%;
        max-width: none;
    }

    label {
        display: block;
        margin-bottom: 0.45rem;
        font-size: 0.95rem;
        font-weight: 600;
        color: #6b7280;
    }

    input {
        width: 100%;
        padding: 0.85rem 1rem;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    input:focus {
        border-color: #2b6cb0;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
    }

    button {
        margin-top: 0.5rem;
        padding: 0.9rem 1rem;
        border: none;
        border-radius: 10px;
        background: #2b6cb0;
        color: #ffffff;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.1s ease;
    }

    button:hover {
        background: #1d4ed8;
    }

    button:active {
        transform: translateY(1px);
    }

    @media (max-width: 480px) {
        body>div {
            padding: 1.5rem;
        }

        h1 {
            font-size: 1.75rem;
        }
    }
</style>
