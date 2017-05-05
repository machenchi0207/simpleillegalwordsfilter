<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:32
 * Copyright:EastSea
 */

namespace SIWF\Tree;

use SIWF\Words\DicCollection;
use SIWF\Words\WordsAdapter;

/**
 * Class Builder
 *
 * @package SIWF\Tree
 */
class Builder
{
    /**
     * @var DicCollection
     */
    protected $dics;

    /**
     * @var string
     */
    protected $charset = 'UTF8';

    /**
     * Builder constructor.
     *
     * @param WordsAdapter $adapter
     */
    public function __construct(WordsAdapter $adapter)
    {
        $this->dics = $adapter->getWords();
    }

    /**
     * @return TreeNode
     */
    public function build()
    {
        $root = new TreeNode();
        foreach ($this->dics as $dic) {
            $node = $root;
            $len = mb_strlen($dic,$this->charset);
            for($i = 0;$i<$len;$i++){
                $childs = $node->getChilds();
                $s = mb_substr($dic,$i,1,$this->charset);
                if(array_key_exists($s, $childs)){
                    $node = $childs[$s];
                    continue;
                }
                $temp = new TreeNode();
                $temp->setCharacter(mb_substr($dic, $i,1,$this->charset));
                $node = $node->addChild(mb_substr($dic,$i,1,$this->charset),$temp);
            }
            $node->setIsEnd(true);
        }
        return $root;
    }
    
    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }
}