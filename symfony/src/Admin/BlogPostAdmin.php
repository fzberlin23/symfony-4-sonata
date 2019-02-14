<?php
    namespace App\Admin;

    use App\Entity\Category;
    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\{TextType, TextareaType};
    use Sonata\AdminBundle\Form\Type\ModelType;

    final class BlogPostAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->with('Content', ['class' => 'col-md-9'])
                    ->add('title', TextType::class)
                    ->add('body', TextareaType::class)
                ->end()
                ->with('Meta data', ['class' => 'col-md-3'])
                    ->add('category', ModelType::class, [
                        'class' => Category::class,
                        'property' => 'name',
                    ])
                ->end()
            ;
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('title');
            $datagridMapper->add('body');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper->addIdentifier('title');
            $listMapper->addIdentifier('body');
        }

        public function toString($object)
        {
            return $object instanceof BlogPost
                ? $object->getTitle()
                : 'Blog Post'; // shown in the breadcrumb on the create view
        }
    }
