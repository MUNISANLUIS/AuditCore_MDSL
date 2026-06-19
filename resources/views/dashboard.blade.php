<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AuditCore MDSL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f6fa;
            min-height: 100vh;
        }

        .navbar {
            background: #2c3e50;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            flex-wrap: wrap;
            gap: 15px;
        }

        .navbar h1 {
            font-size: 20px;
        }

        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .navbar .user-info span {
            color: #ecf0f1;
        }

        .btn-logout {
            background: #e74c3c;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn-logout:hover {
            background: #c0392b;
        }

        .container {
            padding: 40px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .card h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 20px 0;
        }

        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }

        .info-item label {
            color: #888;
            font-size: 12px;
            text-transform: uppercase;
        }

        .info-item p {
            color: #2c3e50;
            font-weight: bold;
            margin-top: 5px;
        }

        .badge {
            display: inline-block;
            background: #27ae60;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1> AuditCore MDSL</h1>
        <div class="user-info">
            <span> {{ $user->name }}</span>
            <span> {{ $user->email }}</span>
            <a href="/logout" class="btn-logout">Cerrar Sesion</a>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <h2> Bienvenido, {{ $user->name }}!</h2>
            <p>Has iniciado sesion correctamente.</p>

            <div class="info-grid">
                <div class="info-item">
                    <label>ID de usuario</label>
                    <p>#{{ $user->id }}</p>
                </div>
                <div class="info-item">
                    <label>Nombre</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="info-item">
                    <label>Email</label>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="info-item">
                    <label>Verificado</label>
                    <p>{{ $user->email_verified_at ? ' Si' : ' No' }}</p>
                </div>
            </div>

            <div class="badge"> Sesion activa</div>
        </div>
    </div>
</body>
</html>