<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SystemPosV1 - Iniciar Sesión</title>
    <style>
        /* ====== Estilos base ====== */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Roboto, Arial, sans-serif;
            background: linear-gradient(135deg, #007bff 0%, #00c6ff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* ====== Caja principal ====== */
        .login-container {
            background: #fff;
            padding: 40px 35px;
            border-radius: 15px;
            width: 360px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ====== Título ====== */
        .login-container h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.6em;
        }

        .login-container p.subtitle {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 25px;
        }

        /* ====== Campos ====== */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: #444;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 0.95em;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* ====== Botón ====== */
        .btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #0056b3;
        }

        /* ====== Mensaje de error ====== */
        .error {
            background: #ffe0e0;
            color: #c00;
            padding: 8px;
            border-radius: 6px;
            font-size: 0.9em;
            margin-bottom: 15px;
        }

        /* ====== Pie de página ====== */
        .footer {
            margin-top: 15px;
            font-size: 0.85em;
            color: #888;
        }

    </style>
</head>
<body>

    <div class="login-container">
        <h2>Bienvenido a SystemPosV1</h2>
        <p class="subtitle">Por favor inicia sesión para continuar</p>

        <?php if (!empty($data['error'])): ?>
            <div class="error"><?= htmlspecialchars($data['error']) ?></div>
        <?php endif; ?>

        <form method="POST" action="/SystemPosV1/public/auth/login">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn">Iniciar sesión</button>
        </form>

        <div class="footer">
            &copy; <?= date('Y') ?> SystemPosV1. Todos los derechos reservados.
        </div>
    </div>

</body>
</html>
