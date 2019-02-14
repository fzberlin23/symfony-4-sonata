<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
     */
    class Category
    {
        /**
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @var string
         *
         * @ORM\Column(name="name", type="string")
         */
        private $name;

        /**
         * @ORM\Column(name="description", type="text")
         */
        private $description;

        /**
         * @ORM\OneToMany(targetEntity="BlogPost", mappedBy="category")
         */
        private $blogPosts;

        /**
         * @ORM\Column(type="integer")
         * @ORM\Version
         */
        private $version;

        public function __construct()
        {
            $this->blogPosts = new ArrayCollection();
        }

        public function getBlogPosts()
        {
            return $this->blogPosts;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
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
