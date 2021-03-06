<?php
/**
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * PHP versions 5
 *
 *
 * @category   自動テスト
 * @package    テストスタブ
 * @subpackage EnviMockLight
 * @author     Suzunone <suzunne.eleven@gmail.com>
 * @copyright  2011-2015 Artisan Project
 * @license    https://github.com/EnviMVC/EnviMockLight/blob/master/LICENSE
 * @version    GIT: $Id$
 * @link       http://www.enviphp.net/
 * @see        http://www.enviphp.net/
 * @since      Class available since Release v1.0.0
 */
namespace EnviMockLight\Containers;


/**
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * @category   自動テスト
 * @package    テストスタブ
 * @subpackage EnviMockLight
 * @author     Suzunone <suzunne.eleven@gmail.com>
 * @copyright  2011-2015 Artisan Project
 * @license    https://github.com/EnviMVC/EnviMockLight/blob/master/LICENSE
 * @version    Release: @package_version@
 * @link       http://www.enviphp.net/
 * @author     Suzunone <suzunne.eleven@gmail.com>
 * @since      Class available since Release v1.0.0
 * @doc_ignore
 */
class MainContainer
{

    protected $data_storage;
    protected $Container;

    protected static $data_storage_by_default;

    /**
     * +-- コンストラクタ
     *
     * @access      public
     * @param       Container $Container
     * @return      void
     */
    public function __construct(Container $Container)
    {
        $this->Container = $Container;
    }
    /* ----------------------------------------- */

    /**
     * +-- コンテナのリセット
     *
     * @access      public
     * @param       string $method_name OPTIONAL:null
     * @return      void
     * @doc_ignore
     */
    public function resetContainer($method_name = null)
    {
        $method_name = is_null($method_name) ? $this->Container->getUsingMethodName() : $method_name;
        if (isset($this->data_storage[$method_name])) {
            unset($this->data_storage[$method_name]);
        }
    }
    /* ----------------------------------------- */


    /**
     * +-- コンテナのセット
     *
     * @access      public
     * @param       string $key
     * @param       string $value
     * @param       string $method_name OPTIONAL:null
     * @return      void
     * @doc_ignore
     */
    public function setContainer($key, $value, $method_name = null)
    {
        $method_name = is_null($method_name) ? $this->Container->getUsingMethodName() : $method_name;
        $this->data_storage[$method_name][$key] = $value;
    }
    /* ----------------------------------------- */



    /**
     * +-- コンテナのアンセット
     *
     * @access      public
     * @param       string $key
     * @param       string $method_name OPTIONAL:null
     * @return      void
     * @doc_ignore
     */
    public function unsetContainer($key, $method_name = null)
    {
        $method_name = is_null($method_name) ? $this->Container->getUsingMethodName() : $method_name;
        unset($this->data_storage[$method_name][$key]);
    }
    /* ----------------------------------------- */


    /**
     * +-- データの取得
     *
     * @access      public
     * @param       string $key
     * @param       mexed $default_value OPTIONAL:false
     * @param       string $method_name OPTIONAL:null
     * @return      mexed
     * @doc_ignore
     */
    public function getContainer($key, $default_value = false, $method_name = null)
    {
        $method_name = is_null($method_name) ? $this->Container->getUsingMethodName() : $method_name;
        return isset($this->data_storage[$method_name][$key]) ? $this->data_storage[$method_name][$key] : (isset(static::$data_storage_by_default[$this->Container->class_name][$method_name][$key]) ? static::$data_storage_by_default[$this->Container->class_name][$method_name][$key] : $default_value);
    }
    /* ----------------------------------------- */


    /**
     * +-- 現在の設定をデフォルトの定義として登録します
     *
     * @access      public
     * @return      void
     * @doc_ignore
     */
    public function byDefault()
    {
        $method_name = $this->Container->getUsingMethodName();
        static::$data_storage_by_default[$this->Container->class_name][$method_name] = $this->data_storage[$method_name];
    }
    /* ----------------------------------------- */


}
