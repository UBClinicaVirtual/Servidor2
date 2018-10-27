<?phpnamespace App\Searchers\AppointmentSearch\Filters;use Illuminate\Database\Query\Builder;use App\Searchers\Filter as Filter;class PatientId implements Filter{    /**     * Apply a given search value to the builder instance.     *     * @param Builder $builder     * @param mixed $value     * @return Builder $builder     */    public static function apply(Builder $builder, $value)    {		return $builder->where( 'patients.id', $value );    }}