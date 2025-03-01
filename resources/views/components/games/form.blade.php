<form action="{{ $action }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label"> Nome: </label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $game->name) }}">
    </div>

    <div class="mb-3">
        <label for="qtd_achievements" class="form-label">Nº De Conquistas Adquiridas</label>
        <input type="number" id="qtd_achievements_true" name="qtd_achievements_true" min="0" class="form-control" value="{{ count($game->achievements) }}">
    </div>

    <div id="achievements-container">
        @foreach ($game->achievements as $achievement)
            <div class="mb-3">
                <label for="achievement_{{ $achievement->id }}" class="form-label">Conquista {{ $loop->iteration }}:</label>
                <input type="text" id="achievement_{{ $achievement->id }}" name="achievements[{{ $achievement->id }}]" class="form-control" value="{{ $achievement->name }}">
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<script>
    document.getElementById('qtd_achievements_true').addEventListener('input', function() {
        var qty = parseInt(this.value);
        var container = document.getElementById('achievements-container');


        container.innerHTML = '';


        for (var i = 1; i <= qty; i++) {
            var inputGroup = document.createElement('div');
            inputGroup.classList.add('mb-3');
            inputGroup.innerHTML = `
                <label for="achievement_${i}" class="form-label">Conquista ${i}:</label>
                <input type="text" id="achievement_${i}" name="achievements[${i}]" class="form-control">
            `;
            container.appendChild(inputGroup);
        }
    });
</script>
