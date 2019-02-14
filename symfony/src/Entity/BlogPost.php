<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Timestampable\Traits\TimestampableEntity;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
     */
    class BlogPost
    {
        use TimestampableEntity;

        /**
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @var string
         *
         * @ORM\Column(name="title", type="string")
         */
        private $title;

        /**
         * @var string
         *
         * @ORM\Column(name="body", type="text")
         */
        private $body;

        /**
         * @var bool
         *
         * @ORM\Column(name="draft", type="boolean")
         */
        private $draft = false;

        /**
         * @ORM\ManyToOne(targetEntity="Category", inversedBy="blogPosts")
         */
        private $category;

        /**
         * @ORM\Column(type="integer")
         * @ORM\Version
         */
        private $version;

        public function getTitle() {
            return $this->title;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function getBody() {
            return $this->body;
        }

        public function setBody($body) {
            $this->body = $body;
        }

        public function getCategory() {
            return $this->category;
        }

        public function setCategory($category) {
            $this->category = $category;
        }

        public function getVersion(): ?int
        {
            return $this->version;
        }

        public function setVersion(int $version): self
        {
            $this->version = $version;

            return $this;
        }
    }
