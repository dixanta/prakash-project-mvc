<?php

namespace db{

    interface RowMapper{
        function mapRow($result);
    }

}