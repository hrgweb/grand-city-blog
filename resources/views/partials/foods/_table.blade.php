<style>
	table tbody td:nth-child(3) { word-break: break-word; }
</style>

<table class="table table-hover" ng-show="isTableShow">
	{{-- <caption><pre>@{{ isEdit }} @{{ isCreate }}</pre></caption> --}}
	<thead>
		<tr>
			<th>Food</th>
			<th>Description</th>
			<th style="width: 150px;">Actions</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="record in records">
			<td>@{{ record.name }}</td>
			<td>@{{ record.description }}</td>
			<td>
				<button type="button" class="btn btn-warning" ng-click="editFood(record)">Edit</button>
				<button type="button" class="btn btn-danger" ng-click="deleteFood(record)">Delete</button>
			</td>
		</tr>
	</tbody>
</table>