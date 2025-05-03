<label class="col-form-label" for="inputSuccess">Provinces<span style="color:red;">*</span></label>
<div class="select2-red">
    <select name="provinces[]" id="provinces" class="form-control select2" multiple="multiple"
    data-placeholder="--Provinces--" data-dropdown-css-class="select2-purple" style="width: 100%;">
       {{--  <option value="" style="text-align: center">--Provinces--</option> --}}
        @foreach ($provinces as $provinces_items)
            <option value="{{ $provinces_items['provinces']->id }}" style="text-align: center">
                {{ $provinces_items['provinces']->name }}
            </option>
        @endforeach
    </select>
</div>
<script>
    jQuery(function($) {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
