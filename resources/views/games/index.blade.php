<x-layout title="Meus Jogos">

    <a href="/games/create" class="btn btn-success mb-3 fw-bold px-4 py-2 shadow-lg d-block text-center">➕ Adicionar Jogo</a>

    @isset($messageSuccessful)
        <div class="alert alert-success text-center fw-bold">
            {{$messageSuccessful}}
        </div>
    @endisset

    <div class="game-container">
        @foreach ($games as $game)
            <div class="game-card">

                <h3 class="game-title">{{$game->name}}</h3>


                <div class="progress-container">
                    <div class="progress">
                        <div class="progress-bar"
                             style="width: {{ ($game->filledAchievementsCount / max($game->qtd_achievements, 1)) * 100 }}%;">
                        </div>
                    </div>
                    <span class="progress-text">
                        {{ $game->filledAchievementsCount }}/{{ $game->qtd_achievements }} Conquistas
                    </span>
                </div>


                <div class="achievements-list">
                    @if ($game->achievements->isEmpty())
                        <span class="achievement">Nenhuma conquista desbloqueada 🏆</span>
                    @else
                        @foreach ($game->achievements as $achievement)
                            <div class="achievement-card">
                                <span class="achievement-name">{{ $achievement->name }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="buttons">
                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-info">✏️ Editar</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑️ Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>

        body {
            background: linear-gradient(135deg, #121212, #1a1a2e, #16213e);
            color: #fff;
            min-height: 100vh;
            padding: 20px;
            font-family: 'Arial', sans-serif;
        }


        .game-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }


        .game-card {
            background: #1a1a2e;
            border: 2px solid #ffcc00;
            border-radius: 10px;
            padding: 20px;
            width: 320px;
            box-shadow: 0 0 10px rgba(255, 204, 0, 0.6);
            transition: transform 0.3s ease-in-out;
        }

        .game-card:hover {
            transform: scale(1.05);
        }


        .game-title {
            color: #ffcc00;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.8);
            margin-bottom: 10px;
        }


        .progress-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .progress {
            width: 100%;
            height: 15px;
            background: #333;
            border-radius: 8px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #ffcc00, #ff9900);
            transition: width 0.5s ease-in-out;
        }

        .progress-text {
            display: block;
            margin-top: 5px;
            font-size: 14px;
            color: #ffcc00;
        }


        .achievements-list {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .achievement-card {
            background: rgba(255, 204, 0, 0.2);
            border: 1px solid #ffcc00;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .achievement-name {
            font-weight: bold;
        }


        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .btn {
            font-size: 14px;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-info {
            background: #007bff;
            border: none;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>

</x-layout>
