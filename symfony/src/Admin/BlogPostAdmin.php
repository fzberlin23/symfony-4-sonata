<?php
    namespace App\Admin;

    use App\Entity\Category;
    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\{TextType, TextareaType};
    use Sonata\AdminBundle\Form\Type\ModelType;
    use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
            $datagridMapper
                ->add('title')
                ->add('category', null, [], EntityType::class, [
                    'class' => Category::class,
                    'choice_label' => 'name',
                ]);
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
                ->addIdentifier('title')
                ->add('category.name')
                ->add('draft');
        }

        public function toString($object)
        {
            return $object instanceof BlogPost
                ? $object->getTitle()
                : 'Blog Post'; // shown in the breadcrumb on the create view
        }
    }
