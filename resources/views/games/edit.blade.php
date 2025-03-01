<x-layout title="🎮 Editar Jogo - {!! $game->name !!}">

    <div class="form-container">
        <h2 class="form-title">🎮 Editar: {{ $game->name }}</h2>

        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="name">Nome do Jogo:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control neon-input"
                    value="{{ old('name', $game->name) }}"
                    autofocus
                >
            </div>


            <div class="form-group">
                <label>Nº De Conquistas: {{ $game->qtd_achievements }}</label>
            </div>


            <div class="row" id="achievements-container">
                @foreach($game->achievements as $achievement)
                    <div class="col-md-2 mb-3">
                        <label for="achievement_{{ $achievement->id }}" class="form-label">Conquista {{ $loop->iteration }}:</label>
                        <input
                            type="text"
                            id="achievement_{{ $achievement->id }}"
                            name="achievements[{{ $achievement->id }}]"
                            class="form-control neon-input"
                            value="{{ old('achievements.' . $achievement->id, $achievement->name) }}"
                            placeholder="Conquista {{ $loop->iteration }}"
                        >
                    </div>
                @endforeach


                @for($i = $game->achievements->count(); $i < $game->qtd_achievements; $i++)
                    <div class="col-md-2 mb-3">
                        <label for="achievement_{{ $i }}" class="form-label">Conquista {{ $i + 1 }}:</label>
                        <input
                            type="text"
                            id="achievement_{{ $i }}"
                            name="achievements[new_{{ $i }}]"
                            class="form-control neon-input"
                            value="{{ old('achievements.new_' . $i) }}"
                            placeholder="Conquista {{ $i + 1 }}"
                        >
                    </div>
                @endfor
            </div>


            <button type="submit" class="btn neon-button">✅ Atualizar</button>
        </form>
    </div>


    <style>

        body {
            background: linear-gradient(135deg, #121212, #1a1a2e, #16213e);
            color: #fff;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .form-container {
            background: #1a1a2e;
            border: 3px solid #ffcc00;
            border-radius: 15px;
            padding: 40px;
            width: 100%;

            box-shadow: 0 0 20px rgba(255, 204, 0, 0.8);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }


        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #ffcc00;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.9);
            margin-bottom: 20px;
        }


        .neon-input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ffcc00;
            border-radius: 5px;
            background: #222;
            color: #fff;
            font-size: 18px;
            outline: none;
            transition: 0.3s;
        }

        .neon-input:focus {
            box-shadow: 0 0 15px #ffcc00;
            border-color: #ff9900;
        }


        .neon-button {
            background: #ffcc00;
            border: none;
            padding: 12px 24px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            color: #000;
        }

        .neon-button:hover {
            background: #ff9900;
            box-shadow: 0 0 15px #ff9900;
        }
    </style>

</x-layout>
