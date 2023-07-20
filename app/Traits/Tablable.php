<?php
    /**
     * Trait Tablable
     * @author EmilienKopp <emilien.kopp@gmail.com>
     * 
     * Made to be used with Eloquent models in Laravel.
     * Allows you to get the columns of a table and map them to their display names,
     * for generic table generation.
     */

    namespace App\Traits;

    use Illuminate\Support\Facades\Schema;

    trait Tablable
    {

        public static function buildTable(
            $headers = null,
            $editables = null,
            $model = null,
            $callback = null
        ) {
            $instance = new static;

            // Make the $editables array be fillable minus hidden columns
            $editables = $editables ?? array_diff($instance->fillable, $instance->hidden);

            // Model name in lowercase
            $model = $model ?? strtolower(class_basename($instance));

            $table = $callback ? $instance->toFilteredTable($callback) : $instance->toTable();

            return (object)[
                'headers' => $headers ?? $table->headers,
                'data' => $table->data,
                'editables' => $editables,
                'model' => $model,
            ];
        }

        /**
         * Get the columns of the table associated with the model.
         * If a $mapping property exists on the model, it will be used to map the columns to their display names.
         */
        public static function headers() {
            $columns = self::columns();

            // Map the columns to their display names if they exist
            $headers = array_map(function($column) {
                return (new static)->mapping[$column] ?? $column;
            }, $columns);

            return $headers;
        }

        /**
         * Get the unmapped columns of the table associated with the model.
         */
        public static function columns() {
            $instance = new static;

            $columns = Schema::getColumnListing($instance->getTable());
            
            // Exclude the 'hidden' columns
            $columns = array_diff($columns, $instance->hidden);

            return $columns;
        }


        /**
         * Take a collection of the model and remove the columns that are not defined by columns().
         */
        public static function toTable() {
            $instance = new static;

            $columns = $instance->columns();

            $collection = $instance->all();

            $collection = $collection->map(function($item) use ($columns) {
                $item = $item->toArray();

                $item = array_intersect_key($item, array_flip($columns));
                return $item;
            });

            return (object)[
                'headers' => $instance->headers(),
                'data' => $collection
            ];
        }

        /**
         * Returns a collection of the model filter by a callback (Eloquent 'where') and remove the columns that are not defined by columns().
         */
        public static function toFilteredTable($callback) {
            $instance = new static;

            $columns = $instance->columns();

            $collection = $instance->where($callback)->get();

            $collection = $collection->map(function($item) use ($columns) {
                $item = $item->toArray();

                $item = array_intersect_key($item, array_flip($columns));
                return $item;
            });

            return (object)[
                'headers' => $instance->headers(),
                'data' => $collection
            ];
        }

        /**
         * Get the mapping of the table associated with the model.
         */
        public static function getMapping() {
            return (new static)->mapping;
        }
    }