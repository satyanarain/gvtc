  $distribution = DB::table('distributions')->select('*',DB::raw('concat(distinct contacts.email separator ", ") AS contact_emails'), 'distributions.id as id', 'distributions.status as status','distributions.day as day','distributions.month as month','distributions.year as year','methods.code_description as method_code_description')
                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
                        ->leftjoin('methods', 'methods.id', 'distributions.method_id')
                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
                        ->leftjoin('observers', 'observers.id', 'distributions.observer_id')
                        ->leftjoin('species', 'species.id', 'distributions.specie_id')
                        ->leftjoin('abundances', 'abundances.id', 'distributions.abundance_id')
                        ->leftjoin('observation', 'observation.id', 'distributions.observation_id')
                        ->leftjoin('ages', 'ages.id', 'distributions.age_id')->get();
        
        return DataTables::of($distribution)->make(true);