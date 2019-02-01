<div class="container-fluid">
    <div class="row print-hide">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="border-top-0">
                                    <!-- <select name="bookIds[]" id="bookId" class="form-control"></select> -->
                                    <div class="search-container">
                                        <input class="form-control" type="text" placeholder="Search.." name="searchqr">
                                        <datalist id="json-datalist"></datalist>
                                    </div>
                                </td>
                                <td class="border-top-0" style="width:65px;">
                                    <a href="#" class="btn btn-outline-success no-border" id="add-book" data-container="body" data-toggle="tooltip" title="" data-original-title="Add Book">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form id="books" class="validate-books" novalidate="novalidate">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th class="text-left">Book</th>
                                    <th style="width: 160px;">Quantity</th>
                                    <th style="width: 65px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
        </div>
    </div>
</div>
<script>
    $('#searchqr').bind('input', function(){
        var search = $(this).val();
        
        if($(this).val() != ""){
            Search.search();
        }
    })
</script>
<!-- <span class="select2-container select2-container--default select2-container--open" style="position: absolute; top: 244px; left: 122px;">
    <span class="select2-dropdown select2-dropdown--below" dir="ltr" style="width: 626px;">
        <span class="select2-search select2-search--dropdown">
            <input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox"></span><span class="select2-results">
	        <ul class="select2-results__options" role="tree" id="select2-bookId-results" aria-expanded="true" aria-hidden="false">
		        <li role="treeitem" aria-live="assertive" class="select2-results__option select2-results__message">Please enter 2 or more characters</li>
	        </ul>
		</span>
    </span>        
</span> -->