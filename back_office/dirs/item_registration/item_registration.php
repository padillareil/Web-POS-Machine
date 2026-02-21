<div class="card shadow-sm">
	<div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">

	  <!-- Left Section: Primary Action -->
	  <div class="d-flex align-items-center gap-2">
	    <button type="button" class="btn btn-success btn-sm">
	      Register Item
	    </button>
	    <!-- Search Item -->
	    <input type="search" name="search-item" id="search-item" class="form-control form-control-sm" placeholder="Search Item..." style="width: 200px;">
	    <!-- Filter by Brand -->
	    <select class="form-select form-select-sm"  style="width: 180px;" title="Brand">
	      <option selected disabled>Brand</option>
	      <option>Brand A</option>
	      <option>Brand B</option>
	    </select>
	  <!-- Right Section: Menu Tools -->
	    <button type="button" class="btn btn-sm" title="Refresh List" onclick="loadItem_Registration()">
	      Refresh
	    </button>
	    <button type="button" class="btn btn-sm" title="Export to Excel">
	      Export Excel
	    </button>
	    <button type="button" class="btn btn-sm" title="Export to Excel">
	      Import CSV
	    </button>
	    <button type="button" class="btn btn-sm" title="Delete Selected Items">
	      Delete
	    </button>
	    <div class="dropdown">
	      <button class="btn btn-sm dropdown-toggle" type="button" id="moreTools" data-bs-toggle="dropdown" aria-expanded="false">
	        More Tools
	      </button>
	      <ul class="dropdown-menu" aria-labelledby="moreTools">
	        <li><a class="dropdown-item" href="#">Bulk Update</a></li>
	        <li><a class="dropdown-item" href="#">Print Labels</a></li>
	        <li><a class="dropdown-item" href="#">Archive Items</a></li>
	      </ul>
	    </div>
	  </div>


	</div>
	<div class="card-body overscroll-auto" style="height: 60vh;">
		<div id="load_itemRegistration"></div>
	</div>
	<div class="card-footer">
		<button type="button" class="btn btn-outline-success" id="btn-prev">Previous</button>
		<button type="button" class="btn btn-outline-success" id="btn-next">Next</button>

	</div>
</div>


<script src="dirs/item_registration/script/item_registration.js"></script>