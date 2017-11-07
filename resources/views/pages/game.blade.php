@extends('layouts.app') @section('content')
<h4 id="level"></h4>
<div class="h-center">
	<button id="start" class="btn btn-success">
		Start
	</button>
</div>
<div id="game-board" class="game-board">
	<div id="chip-list">
	</div>
	<div id="section-1" class="category-section">
		<h3>Category 1</h3>
	</div>
	<div id="section-2" class="category-section">
		<h3>Category 2</h3>
	</div>
	<div class="h-center">
		<button id="next" class="btn btn-primary">
			Next
		</button>
	</div>
</div>
@endsection