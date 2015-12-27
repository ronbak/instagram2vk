<?php
namespace Instagram2Vk\Classes;

use Instagram2Vk\Interfaces\VkPostTransformerInterface;


/**
 * Class VkPostTransformer
 * This tranformer expectd Instagram API post's data and
 * transform it to message text and image path
 *
 * @package Instagram2Vk\Classes
 */
class VkPostTransformer implements VkPostTransformerInterface
{

    private $post = null;

    /**
     * Set post's original data to transform
     *
     * @param $post
     * @return mixed
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * Return text to attach to new post
     *
     * @return mixed
     */
    public function getText()
    {

        if (isset($this->post["caption"]) && isset($this->post["caption"]["text"])) {
            return $this->post["caption"]["text"];
        }

        return "";
    }

    /**
     * Return image
     * or null if skip attaching
     *
     * @return mixed
     */
    public function getImageUrl()
    {
        if (isset($this->post["images"])
            && isset($this->post["images"]["standard_resolution"])
            && isset($this->post["images"]["standard_resolution"]["url"])
        ) {
            return $this->post["images"]["standard_resolution"]["url"];
        }

        return null;
    }

}