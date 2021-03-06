<?php
namespace Misteio\CloudinaryBundle\Twig;

use Misteio\CloudinaryBundle\Wrapper\CloudinaryWrapper;
/**
 * Cloudinary twig extension.
 */
class CloudinaryExtension extends \Twig_Extension
{
    /**
     * The cloudinary library.
     *
     * @var Cloudinary
     */
    protected $cloudinary;
    /**
     * Constructor.
     *
     * @param Cloudinary $cloudinary The cloudinary library.
     */
    public function __construct(CloudinaryWrapper $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }


    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('cloudinary_url', array($this, 'getUrl'))
        );
    }


    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('cloudinary_url', array($this, 'getUrl'))
        );
    }


    /**
     * Get the cloudinary URL.
     *
     * @param string $id Image ID.
     * @param array $options options for the image.
     * @return string
     */
    public function getUrl($id, $options = array())
    {
        return $this->cloudinary->show($id, $options);
    }


    /**
     * Get the cloudinary image tag.
     *
     * @param string $id Image ID.
     * @param array $options options for the image.
     * @return string
     */
    public function getImageTag($id, $options = array())
    {
        return cl_image_tag($id, $options);
    }


    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'cloudinary';
    }
}