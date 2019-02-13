<?php
    namespace App\Admin;

    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\{TextType, TextareaType};

    final class CategoryAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper->add('name', TextType::class);
            $formMapper->add('description', TextareaType::class);
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('name');
            $datagridMapper->add('description');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper->addIdentifier('name');
            $listMapper->addIdentifier('description');
        }
    }
