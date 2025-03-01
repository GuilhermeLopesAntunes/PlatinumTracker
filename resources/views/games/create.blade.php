    <x-layout title="Novo Jogo">

        <div class="form-container">
            <h2 class="form-title">🎮 Adicionar Novo Jogo</h2>

            <form action="{{ route('games.store') }}" method="POST">
                @csrf


                <div class="form-group">
                    <label for="name">Nome do Jogo:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control neon-input"
                        placeholder="Digite o nome do jogo..."
                        value="{{ old('name') }}"
                        autofocus
                    >
                </div>


                <div class="form-group">
                    <label for="qtd_achievements">Nº de Conquistas:</label>
                    <input
                        type="number"
                        id="qtd_achievements"
                        name="qtd_achievements"
                        class="form-control neon-input"
                        placeholder="Quantidade de conquistas"
                        min="0"
                        value="{{ old('qtd_achievements') }}"
                    >
                </div>


                <button type="submit" class="btn neon-button">➕ Adicionar Jogo</button>
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
                border: 2px solid #ffcc00;
                border-radius: 10px;
                padding: 30px;
                width: 100%;
                box-shadow: 0 0 15px rgba(255, 204, 0, 0.6);
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }


            .form-title {
                font-size: 22px;
                font-weight: bold;
                color: #ffcc00;
                text-shadow: 0 0 10px rgba(255, 204, 0, 0.8);
                margin-bottom: 20px;
            }


            .form-group {
                margin-bottom: 15px;
                text-align: left;
                width: 100%;
            }

            .form-group label {
                font-size: 14px;
                font-weight: bold;
                color: #ffcc00;
            }

            .neon-input {
                width: 100%;
                padding: 10px;
                border: 2px solid #ffcc00;
                border-radius: 5px;
                background: #222;
                color: #fff;
                font-size: 16px;
                outline: none;
                transition: 0.3s;
            }

            .neon-input:focus {
                box-shadow: 0 0 10px #ffcc00;
                border-color: #ff9900;
            }


            .neon-button {
                background: #ffcc00;
                border: none;
                padding: 12px 20px;
                font-size: 16px;
                font-weight: bold;
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
                color: #000;
            }

            .neon-button:hover {
                background: #ff9900;
                box-shadow: 0 0 10px #ff9900;
            }
        </style>

    </x-layout>
