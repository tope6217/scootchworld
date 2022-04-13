<div class="modal fade" id="subscribtion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="message" class="btn btn-success"></span>
                <form action="" method="POST" >
                    <div class="form-group">
                        <label for="desc">Sub name</label>
                        <input name="sub_name" class="form-control border col-form-label">
                        <span class="error" id="sub_name"></span>
                    </div>
                    @csrf
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input name="amount" type="number" class="form-control border col-form-label">
                        <span class="error" id="amount"></span>
                    </div>
                    <div class="form-group">
                        <label for="desc">Active</label>
                        <select name="isActive" class="form-control border col-form-label">
                        <option value="0">false</option>
                        <option value="1">true</option>
                        </select>
                        <span class="error" id="isActive"></span>
                    </div>
                    <div class="form-group">
                        <label for="desc">No Of Ads</label>
                        <input name="NoOfAds" type="number" class="form-control border col-form-label">
                        <span class="error" id="NoOfAds"></span>
                    </div>
                    <div class="form-group">
                        <label for="desc">No of Days</label>
                        <input name="NofDays" type="number" class="form-control border col-form-label">
                        <span class="error" id="NofDays"></span>
                    </div>
                    <div class="form-group">
                        <label for="desc">infinte No Of Ads</label>
                        <select name="is_infinteNoOfAds" type="number" class="form-control border col-form-label">
                            <option value="0">False</option>
                            <option value="1">True</option>
                        </select>
                        <span class="error" id="is_infinteNoOfAds"></span>
                    </div>
                    <div class="form-group">
                        <label for="is_infinteNofDays">infinteNofDays</label>
                        <select name="is_infinteNofDays" type="number" class="form-control border col-form-label">
                            <option value="0">False</option>
                            <option value="1">True</option>
                        </select>
                    </div>
                    <input type="submit" value="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


