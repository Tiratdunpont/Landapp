<div class="container">
    <form method="POST" action="Search">
        {{ csrf_field() }}

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div id="imaginary_container">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" id="search">
                            <span class="input-group-addon">
                            <button style=" padding: 0; border: none; background: none;"
                                    type="submit">&#128269;</button>
                        </span>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="text-right" href="/home">Clear filters</a>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <div class="dropdown text-right">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sort and filter by:
            <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
            <li><a class="text-right" href="/home?Status=Nuoma iš privačių">Nuoma iš privačių</a></li>
            <li><a class="text-right" href="/home?Status=Susikeitimas">Susikeitimas</a></li>
            <li><a class="text-right" href="/home?UniqueLandNumber=desc">Unique Land Number &uarr;</a></li>
            <li><a class="text-right" href="/home?UniqueLandNumber=asc">Unique Land Number &darr;</a></li>
            <li><a class="text-right" href="/home?PersonalNumber=desc">Personal Number &uarr;</a></li>
            <li><a class="text-right" href="/home?PersonalNumber=asc">Personal Number &darr;</a></li>
        </ul>
    </div>
</div>
