 <!-- Modal for search_modal-->
 <div class="modal fade" id="search_modal" tabindex="-1" role="dialog" aria-labelledby="SearchModalLabel" aria-hidden="true" onkeydown="returnKeySearch()">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-muted">Search</h4>
                <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <div class="mb-2 before_search" id="Search_model" style="display:block;">
                    <form id="search_form">
                        <label for="search_contentlabel"><b>Search</b></label>
                        <div id="searchBar">
                            <input class="form-control" type="text"  id="searchVal" name="searchVal"></input> <br>
                            <input type="button" class="btn btn-warning text-light" id="Search_btn" value="Search"></input>
                        </div>
                        <div  id="showContent">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark modalClose" data-dismiss="modal" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


