<?php
//SQL ��
class Sql{
    /**    * @var array    */
    protected $fields = array();

    /**    * @var array    */
    protected $from = array();

    /**    * @var array    */
    protected $where = array();

    /**    * ��� select �ֶ�    *    * @param array $fields    *    * @return SQL    */
    public function select(array $fields = array())
    {
        $this->fields = $fields;

        return $this;
    }

    /**    * ��� FROM �Ӿ�    *    * @param string $table    * @param string $alias    *    * @return SQL    */
    public function from($table, $alias)
    {
        $this->from[] = $table . ' AS ' . $alias;

        return $this;
    }

    /**    * ��� WHERE ����    *    * @param string $condition    *    * @return SQL    */
    public function where($condition)
    {
        $this->where[] = $condition;

        return $this;
    }

    /**    * ���ɲ�ѯ���    *    * @return string    */
    public function getQuery()
    {
        return 'SELECT ' . implode(',', $this->fields)
                . ' FROM ' . implode(',', $this->from)
                . ' WHERE ' . implode(' AND ', $this->where);
    }
}

//���ӿ�ģʽ����
$instance = new Sql();
//��ʽ��������SQL���
$query = $instance->select(array('foo', 'bar'))
			->from('foobar', 'f')
            ->where('f.bar = ?')
            ->getQuery();
